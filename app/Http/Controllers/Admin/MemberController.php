<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Mail\MemberCreateMail;
use App\Mail\CancelLockerMail;
use App\Mail\CancelServiceMail;
use App\Mail\CancelTreadmillMail;
use App\Mail\MemberDeletion;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Member;
use App\Models\Service;
use App\Models\Locker;
use App\Models\Treadmill;
use App\Models\MembershipDuration;
use App\Models\Prices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;


use Illuminate\Support\Facades\Mail;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Endroid\QrCode\ErrorCorrectionLevel;

// export member table to excel
use App\Exports\MembersExport;
use App\Exports\ServicesExport;
use App\Exports\LockersExport;
use App\Exports\TreadmillsExport;
use Maatwebsite\Excel\Facades\Excel;


class MemberController extends Controller
{



    public function index(Request $request)
    {

        if (
            !auth()->user()->canany([
                'member-create',
                'member-view',
                'member-services',
                'member-list',
                'member-edit',
                'member-membership-renew',
                'member-delete',
                'subscription-create',
                'subscription-extend',
                'subscription-end',
                'locker-create',
                'locker-extend',
                'locker-end',
                'treadmill-create',
                'treadmill-extend',
                'treadmill-end'
            ])
        ) {
            abort(404); // forbidden / not found
        }


        $query = Member::with(['services', 'lockers', 'treadmills', 'qrcode', 'membershipDuration'])
            ->orderBy('created_at', 'desc');
        $keynumber = '*****';

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('id_number', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('fb', 'like', '%' . $searchTerm . '%')
                    ->orWhere('membership_type', 'like', '%' . $searchTerm . '%');


            })
                ->orWhereHas('membershipDuration', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('status', 'like', '%' . $searchTerm . '%')
                        ->orWhere('start_date', 'like', '%' . $searchTerm . '%')
                        ->orWhere('due_date', 'like', '%' . $searchTerm . '%');
                });


        }



        $members = $query->paginate(10)->withQueryString();

        $occupiedLockers = Locker::whereIn('status', ['Active', 'Pre-paid', 'Impending', 'Due', 'Overdue'])->pluck('locker_no')->toArray();
        $prices = Prices::pluck('price', 'service_type');


        // Process each member's subscription status
        foreach ($members as $member) {
            // Initialize subscription status flags
            $member->hasSubscriptions = false;
            $member->hasOverdueSubscription = false;
            $member->hasValidSubscription = false;
            $member->hasActiveSubscription = false;

            // Check services
            foreach ($member->services as $service) {
                $member->hasSubscriptions = true; // Has at least one service

                if ($service->status === 'Overdue') {
                    $member->hasOverdueSubscription = true;
                }
                if (in_array($service->status, ['Due', 'Impending', 'Active', 'Pre-paid'])) {
                    $member->hasValidSubscription = true;
                }
                if (in_array($service->status, ['Active', 'Impending', 'Due'])) {
                    $member->hasActiveSubscription = true;
                }
            }

            // Check lockers
            foreach ($member->lockers as $locker) {
                $member->hasLockers = true;

                if ($locker->status === 'Overdue') {
                    $member->hasOverdueLocker = true;
                }
                if (in_array($locker->status, ['Due', 'Impending', 'Active', 'Pre-paid'])) {
                    $member->hasValidLocker = true;
                }
                if (in_array($locker->status, ['Active', 'Impending', 'Due'])) {
                    $member->hasActiveLocker = true;
                }
            }

            // Check treadmills
            foreach ($member->treadmills as $treadmill) {
                $member->hasTreadmill = true;

                if ($treadmill->status === 'Overdue') {
                    $member->hasOverdueTreadmill = true;
                }
                if (in_array($treadmill->status, ['Due', 'Impending', 'Active', 'Pre-paid'])) {
                    $member->hasValidTreadmill = true;
                }
                if (in_array($treadmill->status, ['Active', 'Impending', 'Due'])) {
                    $member->hasActiveTreadmill = true;
                }
            }



            // to proceed should have using search, search is not just spaces and the id_number matches to searched data
            if ($request->has('search') && trim($request->search) !== '' && $member->id_number === $request->search) {

                if ($member->hasActiveSubscription) {
                    $keynumber = $request->search;
                } else {
                    $keynumber = '*****';
                }
            }

        }

        session()->put('form_token', uniqid());
        return view('administrator.members.index', compact('members', 'occupiedLockers', 'keynumber', 'prices'));
    }




    public function create()
    {

        if (!auth()->user()->canany(['member-create', 'subscription-create', 'locker-create', 'treadmill-create',])) {
            abort(404); // forbidden / not found
        }

        $occupiedLockers = Locker::where('status', 'Active')->pluck('locker_no')->toArray();
        $prices = Prices::pluck('price', 'service_type');

        session()->put('form_token', uniqid());
        return view('administrator.members.create', compact('occupiedLockers', 'prices'));
    }

    protected function getPriceList()
    {
        // Fetch all prices and create an associative array: 'service_type' => 'price'
        return Prices::query()
            ->pluck('price', 'service_type') //creates array of Price table datas
            ->toArray();
    }
    public function store(Request $request)
    {



        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^\+?[0-9\s\-()]*$/', 'unique:' . Member::class],

            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:100', 'unique:' . Member::class],
            'membership_type' => 'required|in:Regular,Manual,Walkin',

            'manual-price' => 'nullable|numeric|min:0'

        ]);



        DB::beginTransaction();

        try {
            $request->validate([
                // Service types must be present
                'service_type_1' => 'nullable|string|max:255',
                'service_type_2' => 'nullable|string|max:255',
                'service_type_3' => 'nullable|string|max:255',
                'service_type_4' => 'nullable|string|max:255',
                'start_date_1' => 'nullable|date',
                'start_date_2' => 'nullable|date',
                'start_date_3' => 'nullable|date',
                'start_date_4' => 'nullable|date',

                'amount_1' => 'nullable|numeric',
                'amount_2' => 'nullable|numeric',
                'amount_3' => 'nullable|numeric',
                'amount_4' => 'nullable|numeric',



                // Locker fields can be nullable
                'locker_start_date' => 'nullable|date',
                'locker_no' => 'nullable|integer',
                'locker_month' => 'nullable|numeric|min:1|max:12',

                //Treadmill
                'treadmill_start_date' => 'nullable|date',
                'treadmill_months' => 'nullable|integer|min:1|max:12', // Assuming 12 is the max
            ]);

            if (!$request->session()->has('form_token')) {
                return redirect()->back()->withErrors('Invalid form submission.');
            }
            session()->forget('form_token');

            $prices = Prices::pluck('price', 'service_type')->toArray();


            $amount = 0; // Default for 'Manual' or undefined cases
            if ($request->membership_type === 'Regular') {
                $amount = $prices['Regular'] ?? 0; // Use 0 if price is not found
            } elseif ($request->membership_type === 'Walkin') {
                $amount = $prices['Walk-in'] ?? 0; // Use 0 if price is not found
            } elseif ($request->membership_type === 'Manual') {
                $amount = $request->input('manual-price') ?? 0; // Use 0 if price is not found
            }



            $member = Member::create(array_merge(
                $request->only(['name', 'phone', 'email', 'fb', 'membership_type']),
                ['amount' => $amount]
            ));

            $priceList = $this->getPriceList();

            // STORE MEMBERSHIP DURATION
            $startDate = now();
            $dueDate = $startDate->copy()->addYear(); // Default duration of 1 year


            MembershipDuration::create([
                'member_id' => $member->id,
                'start_date' => $startDate,
                'due_date' => $dueDate,
                'status' => 'Active'
            ]);


            Mail::to(config('app.superadminemail'))->send(new MemberCreateMail(
                $member->name,
                $member->membership_type,
                $member->amount,
                $member->membershipDuration->start_date ?? 'N/A',
                $member->membershipDuration->due_date ?? 'N/A',
                $member->membershipDuration->status ?? 'N/A'
            ));


            $serviceTypeToMonths = [
                '1month' => 1,
                '1monthstudent' => 1,
                '3month' => 3,
                '6month' => 6,
                '12month' => 12,
                'WalkinService' => 1,
                'locker' => 1,
                'treadmill' => 1,
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
            ];


            // STORE SUBSCRIPTIONS
            for ($i = 1; $i <= 4; $i++) {
                if ($request->filled("service_type_{$i}") && $request->filled("start_date_{$i}")) {

                    $serviceType = $request->input("service_type_{$i}");
                    $months = $serviceTypeToMonths[$serviceType] ?? 1;
                    $startDate = $request->input("start_date_{$i}");

                    // If service type is manual, use the amount input from the form instead else normal
                    if ($request->membership_type === 'Manual') {
                        $totalAmount = $request->input("amount_{$i}");
                    } else {
                        $totalAmount = $priceList[$serviceType] ?? null;
                    }

                    // If the totalAmount is still not found or invalid, return an error response
                    if (is_null($totalAmount)) {
                        return response()->json(['error' => "Price for {$serviceType} not found."], 404);
                    }

                    if ($request->membership_type === 'Walkin') {
                        // Set due date to 1 day only for Walkin
                        $dueDate = $startDate; // Adds 1 day from the current date
                    } else {
                        // Calculate due date normally for other services
                        $dueDate = $this->calculateDueDate($startDate, 'Monthly', $months);
                    }

                    $service = new Service([
                        'service_type' => $serviceType,
                        'start_date' => $startDate,
                        'due_date' => $dueDate,
                        'amount' => $totalAmount,
                        'month' => $months,
                        'status' => 'Active',
                        'service_id' => 'SRV-' . Str::random(10),
                    ]);

                    $member->services()->save($service);
                }
            }



            // STORE LOCKERS
            // Only create a locker if the start date is filled
            if ($request->filled('locker_start_date') && $request->filled('locker_no') && $request->filled('locker_month')) {

                $months = intval($request->input("locker_month"));
                $startDate = $request->input("locker_start_date");

                $customservice_type = 'locker'; // 200
                $serviceType = $customservice_type; // 200
                $totalAmount = $priceList[$serviceType] ?? null; // 200

                $totalAmount = ($totalAmount * $months); // 200 *

                $member->lockers()->create([
                    'start_date' => $startDate,
                    'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
                    'amount' => $totalAmount,
                    'month' => $months,
                    'locker_no' => $request->input("locker_no"),

                    'status' => 'Active',
                ]);
            }


            // STORE TREADMILLS
            if ($request->filled('treadmill_start_date') && $request->filled('treadmill_months')) {
                $months = intval($request->input("treadmill_months"));
                $startDate = $request->input("treadmill_start_date");

                $customservice_type = 'treadmill'; //set custom locker type to be compared
                $serviceType = $customservice_type; // reset its name
                $totalAmount = $priceList[$serviceType] ?? null; //find/compare the custom to the Price table and sets corresponding price to totalamount

                $totalAmount = ($totalAmount * $months); // multiply the total amount to month quantity chosen


                $member->treadmills()->create([
                    'start_date' => $startDate,
                    'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
                    'month' => $months,
                    'amount' => $totalAmount,
                    'status' => 'Active',
                ]);
            }

            $this->updateServiceStatus();
            $this->updateLockerStatus();

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Member register success!');
        } catch (\Exception $e) {
            Log::error('Error storing member data: ' . $e->getMessage(), ['request' => $request->all()]);
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    private function calculateDueDate($startDate, $serviceType, $months = 1)
    {
        $start = Carbon::parse($startDate);

        return $serviceType === 'Monthly' ? $start->addMonths($months) : $start->addYears($months);
    }





    public function endService(Service $service)
    {

        if (auth()->user()->getRoleNames()->first() == 'SuperAdmin') {
            $service->update([
                'action_status' => 'Suspended',
                'status' => 'Ended',
            ]);
            return redirect()->back()->with('success', 'Service Plan Ended.');
        } else {
            $service->update(['action_status' => 'Pending']);
            Mail::to(config('app.superadminemail'))->send(new CancelServiceMail($service));

            return redirect()->back()->with('success', 'Posted: Pending for approval.');
        }



    }


    public function endLocker(Locker $locker)
    {

        if (auth()->user()->getRoleNames()->first() == 'SuperAdmin') {
            $locker->update([
                'action_status' => 'Suspended',
                'status' => 'Ended',
            ]);
            return redirect()->back()->with('success', 'Locker terminated.');
        } else {
            $locker->update(['action_status' => 'Pending']);
            Mail::to(config('app.superadminemail'))->send(new CancelLockerMail($locker));

            return redirect()->back()->with('success', 'Posted: Pending for approval.');
        }


    }
    public function endTreadmill(Treadmill $treadmill)
    {

        if (auth()->user()->getRoleNames()->first() == 'SuperAdmin') {
            $treadmill->update([
                'action_status' => 'Suspended',
                'status' => 'Ended',
            ]);
            return redirect()->back()->with('success', 'Treadmill terminated.');
        } else {
            $treadmill->update(['action_status' => 'Pending']);
            Mail::to(config('app.superadminemail'))->send(new CancelTreadmillMail($treadmill));

            return redirect()->back()->with('success', 'Posted: Pending for approval.');
        }



    }


    // __________________________________________________________________________________________________EXTEND SERVICE
    public function extend(Request $request, $id)
    {
        //check for duplicate submission
        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        session()->forget('form_token');

        $priceList = $this->getPriceList();

        $request->validate([
            'service_type' => 'required|string',
            'start_date' => 'required|date',

        ]);
        $member = Member::findOrFail($id);


        $serviceTypeToMonths = [
            '1month' => 1,
            '1monthstudent' => 1,
            '3month' => 3,
            '6month' => 6,
            '12month' => 12,
            'WalkinService' => 1,
            'locker' => 1,
            'treadmill' => 1,
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
            '6' => 6,
            '7' => 7,
            '8' => 8,
            '9' => 9,
            '10' => 10,
        ];

        $serviceType = $request->input("service_type");
        $startDate = Carbon::parse($request->start_date);
        $months = $serviceTypeToMonths[$serviceType] ?? 1;


        if ($member->membership_type === 'Manual') {
            $totalAmount = $request->input("amount");

        } else {
            $totalAmount = $priceList[$serviceType] ?? null;
        }

        if (is_null($totalAmount)) {
            return response()->json(['error' => "Price for {$serviceType} not found."], 404);
        }

        if ($member->membership_type === 'Walkin') {
            // Set due date to 1 day only for Walkin
            $dueDate = $startDate->addDay();
        } else {
            // Calculate due date normally for other services
            $dueDate = $this->calculateDueDate($startDate, 'Monthly', $months);
        }

        $newService = new Service([
            'service_type' => $serviceType,
            'start_date' => $startDate,
            'due_date' => $dueDate,
            'amount' => $totalAmount,
            'month' => $months,
            'status' => 'Active',
            'service_id' => 'SRV-' . \Illuminate\Support\Str::random(10),
        ]);


        $member->services()->save($newService);

        $this->updateServiceStatus();
        return redirect()->back()->with('success', 'Subscription extended!');
    }

    public function rentLocker(Request $request, $id)
    {
        //check for duplicate submission
        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        session()->forget('form_token');

        //reirive the price of the locker from price table
        $priceList = $this->getPriceList();

        $request->validate([
            'locker_no' => 'required|string',
            'start_date' => 'required|date',
            'month' => 'required|numeric|min:1|max:12',

        ]);


        //convert locker price to each month
        $serviceTypeToMonths = [
            'locker' => 1,
        ];

        $member = Member::findOrFail($id);
        $months = intval($request->input("month"));
        $startDate = $request->input("start_date");

        $customservice_type = 'locker'; //set custom locker type to be compared
        $serviceType = $customservice_type; // reset its name
        $totalAmount = $priceList[$serviceType] ?? null; //find/compare the custom to the Price table and sets corresponding price to totalamount

        $totalAmount = ($totalAmount * $months); // multiply the total amount to month quantity chosen

        $newLocker = new Locker([
            'start_date' => $startDate,
            'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
            'amount' => $totalAmount,
            'month' => $months,
            'locker_no' => $request->locker_no,
            'status' => 'Active',
        ]);


        $member->lockers()->save($newLocker);

        $this->updateLockerStatus();

        return redirect()->back()->with('success', 'Locker rental success!');
    }

    public function extendTreadmill(Request $request, $id)
    {

        //check for duplicate submission
        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        session()->forget('form_token');

        //reirive the price of the locker from price table
        $priceList = $this->getPriceList();
        $request->validate([
            'start_date' => 'nullable|date',
            'month' => 'nullable|integer|min:1|max:12', // Assuming 12 is the max
        ]);

        $serviceTypeToMonths = [
            'treadmill' => 1,
        ];

        $member = Member::findOrFail($id);
        $startDate = $request->input("start_date");
        $months = intval($request->input("month"));

        $customservice_type = 'treadmill'; //set custom locker type to be compared
        $serviceType = $customservice_type; // reset its name
        $totalAmount = $priceList[$serviceType] ?? null; //find/compare the custom to the Price table and sets corresponding price to totalamount

        $totalAmount = ($totalAmount * $months); // multiply the total amount to month quantity chosen


        $newTreadmill = new Treadmill([
            'start_date' => $startDate,
            'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
            'month' => $months,
            'amount' => $totalAmount,
            'status' => 'Active',
        ]);

        $member->treadmills()->save($newTreadmill);


        $this->updateTreadmillStatus();
        return redirect()->back()->with('success', 'Treadmill rental success!');
    }



    public function renew(Member $member)
    {
        $startDate = now();
        if ($member->membership_type === 'Walkin') {
            $dueDate = $startDate->copy()->endOfDay(); // if Walkin - set due to today
        } else {
            $dueDate = now()->addYear();
        }



        if ($member->membershipDuration) {
            // Update existing membership duration
            $member->membershipDuration->update([
                'start_date' => $startDate,
                'due_date' => $dueDate,
                'status' => 'Active'
            ]);

            return redirect()->back()->with('success', 'Membership renewed!');
        } else {

            $member->membershipDuration()->create([
                'start_date' => $startDate,
                'due_date' => $dueDate,
                'status' => 'Active'
            ]);

            return redirect()->back()->with('success', 'Membership activated!');
        }
    }

    public function changemembership(Request $request, Member $member)
    {
        $validated = $request->validate([
            'membership_type' => 'required|in:Regular,Manual',
        ]);


        $member->membership_type = $validated['membership_type'];
        $member->save();

        return redirect()->back()->with('success', 'Membership updated!');
    }


    public function UpdateServiceStatus()
    {
        Artisan::call('service:update-status');
    }
    public function updateLockerStatus()
    {
        Artisan::call('locker:update-status');
    }

    public function updateTreadmillStatus()
    {
        Artisan::call('treadmill:update-status');
    }
    private function checkIfDuplicate(Request $request)
    {
        if ($request->input('form_token') !== session('form_token')) {
            // If duplicate submission, just go back to the previous page
            return redirect()->back()->with('duplicate', 'Duplicate submission detected!');
        }
        return null; // Return null if there's no duplicate submission
    }

    public function getRelationStartDate($memberId, $relation): JsonResponse
    {
        if (!in_array($relation, ['services', 'lockers', 'treadmills'])) {
            return response()->json(['error' => 'Invalid relation type'], 400);
        }


        $validStatuses = ['Active', 'Pre-paid', 'Due', 'Overdue', 'Expired'];


        $member = Member::with([
            $relation => function ($query) use ($validStatuses) {

                $query->whereIn('status', $validStatuses)
                    ->orderBy('due_date', 'desc');
            }
        ])->findOrFail($memberId);

        $latestRecord = $member->$relation->first();

        $startDate = $latestRecord
            ? Carbon::parse($latestRecord->due_date)->addDay()->format('Y-m-d')
            : Carbon::now()->format('Y-m-d');

        return response()->json(['start_date' => $startDate]);
    }


    public function exportMembers()
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
    public function exportServices()
    {
        return Excel::download(new ServicesExport, 'services.xlsx');
    }

    public function exportLockers()
    {
        return Excel::download(new LockersExport, 'lockers.xlsx');
    }
    public function exportTreadmills()
    {
        return Excel::download(new TreadmillsExport, 'treadmills.xlsx');
    }

    public function destroy($id)
    {


        if (auth()->user()->getRoleNames()->first() == 'SuperAdmin') { //auto delete if the admin is deleting

            $member = Member::findOrFail($id);
            $member->delete();

            return redirect()->route('members.index')->with('success', 'Member deleted!');

        } else { //auth user not superadmin requires approval before delte

            $member = Member::find($id);
            if (!$member) {
                return response()->json(['message' => 'Member not found'], 404);
            }
            Mail::to(config('app.superadminemail'))->send(new MemberDeletion($member));
            $member->update(['action_status' => 'Pending']);

            return redirect()->route('members.index')->with('success', 'Deletion: Waiting for Approval.');
        }


    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^\+?[0-9\s\-()]*$/'],
            'fb' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'membership_type' => 'required|in:Regular,Student',
        ]);

        $member = Member::findOrFail($id);
        $member->update($validated);

        return redirect()->route('members.index')
            ->with('success', 'Member update success!');
    }


}