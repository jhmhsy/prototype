<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
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
                'member-list',
                'member-edit',
                'member-membership-renew',
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


        $query = Member::with(['services', 'lockers', 'treadmills', 'qrcode', 'membershipDuration']);

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('id_number', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('fb', 'like', '%' . $searchTerm . '%');
            });
        }
        $members = $query->get();

        $occupiedLockers = Locker::whereIn('status', ['Active', 'Due', 'Overdue'])->pluck('locker_no')->toArray();


        session()->put('form_token', uniqid());
        return view('administrator.members.index', compact('members', 'occupiedLockers'));
    }


    public function create()
    {

        if (!auth()->user()->canany(['member-create', 'subscription-create', 'locker-create', 'treadmill-create',])) {
            abort(404); // forbidden / not found
        }

        $occupiedLockers = Locker::where('status', 'Active')->pluck('locker_no')->toArray();

        session()->put('form_token', uniqid());
        return view('administrator.members.create', compact('occupiedLockers'));
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
        session()->forget('form_token');

        $priceList = $this->getPriceList();

        $request->validate([
            'name' => 'required|string|max:50',
            'phone' => ['nullable', 'string', 'max:20', 'regex:/^\+?[0-9\s\-()]*$/'],
            'fb' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'membership_type' => 'required|in:Regular,Student',

            // Service types must be present
            'service_type_1' => 'nullable|string|max:255',
            'service_type_2' => 'nullable|string|max:255',
            'service_type_3' => 'nullable|string|max:255',
            'service_type_4' => 'nullable|string|max:255',
            'start_date_1' => 'nullable|date',
            'start_date_2' => 'nullable|date',
            'start_date_3' => 'nullable|date',
            'start_date_4' => 'nullable|date',

            // Locker fields can be nullable
            'locker_start_date' => 'nullable|date',
            'locker_no' => 'nullable|integer',
            'locker_month' => 'nullable|numeric|min:1|max:12',

            //Treadmill
            'treadmill_start_date' => 'nullable|date',
            'treadmill_months' => 'nullable|integer|min:1|max:12', // Assuming 12 is the max
        ]);
        // Create member
        $member = Member::create([
            'id_number' => rand(10000, 99999),
            'name' => $request->name,
            'phone' => $request->phone,
            'fb' => $request->fb,
            'email' => $request->email,
            'membership_type' => $request->membership_type,
            'user_identifier' => Str::random(28),
        ]);




        // Generate QR Code
        $qrData = $member->id_number; // Using member's ID number as QR data
        $qrCode = new QrCode(data: $qrData);
        $qrCode->setSize(300)
            ->setMargin(10)
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
            ->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8'));

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $fileName = 'qrcode_' . $member->id_number . '_' . time() . '.png';

        $imagePath = 'public/qrcodes/' . $fileName;
        Storage::put($imagePath, $result->getString());

        // Create QR code record in database
        $member->qrcode()->create([
            'qr_image_path' => $fileName,
            'qr_data' => $qrData
        ]);


        $serviceTypeToMonths = [
            '1month' => 1,
            '1monthstudent' => 1,
            '3month' => 3,
            '6month' => 6,
            '12month' => 12,
            'locker' => 1,
            'treadmill' => 1,
        ];


        // STORE MEMBERSHIP DURATION
        $startDate = now();
        $dueDate = now()->addYear(); // Adjust this based on your membership duration policy

        MembershipDuration::create([
            'member_id' => $member->id,
            'start_date' => $startDate,
            'due_date' => $dueDate,
            'status' => 'Active'
        ]);


        // STORE SUBSCRIPTIONS
        for ($i = 1; $i <= 4; $i++) {
            if ($request->filled("service_type_{$i}") && $request->filled("start_date_{$i}")) {

                $serviceType = $request->input("service_type_{$i}");
                $months = $serviceTypeToMonths[$serviceType] ?? 1;
                $startDate = $request->input("start_date_{$i}");


                if ($serviceType == '1month' && $request->membership_type == 'Student') {
                    $serviceType = '1monthstudent';
                }

                $totalAmount = $priceList[$serviceType] ?? null;



                if (is_null($totalAmount)) {
                    return response()->json(['error' => "Price for {$serviceType} not found."], 404);
                }

                $service = new Service([
                    'service_type' => $serviceType,
                    'start_date' => $startDate,
                    'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months),
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

        return redirect()->back()->with([
            'success' => 'Member registered successfully!',
            'qrCodeUrl' => Storage::url('qrcodes/' . $fileName)
        ]);
    }

    private function calculateDueDate($startDate, $serviceType, $months = 1)
    {
        $start = \Carbon\Carbon::parse($startDate);

        return $serviceType === 'Monthly' ? $start->addMonths($months) : $start->addYears($months);
    }

    public function endService(Service $service)
    {
        // Update status to "Ended"
        $service->update(['status' => 'Ended']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Subscription Ended.');
    }
    public function endLocker(Locker $locker)
    {
        // Update status to "Ended"
        $locker->update(['status' => 'Ended']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Subscription Ended.');
    }
    public function endTreadmill(Treadmill $treadmill)
    {
        // Update status to "Ended"
        $treadmill->update(['status' => 'Ended']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Subscription Ended.');
    }


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
            'service_type' => 'required|in:1month,3month,6month,12month',
            'start_date' => 'required|date',
        ]);
        $member = Member::findOrFail($id);



        $serviceTypeToMonths = [
            '1month' => 1,
            '3month' => 3,
            '6month' => 6,
            '12month' => 12,
        ];

        $serviceType = $request->input("service_type");
        $startDate = $request->start_date;
        $months = $serviceTypeToMonths[$serviceType] ?? 1;


        //check if the member is student then the member gets to use student price
        if ($serviceType == '1month' && $member->membership_type == 'Student') {
            $serviceType = '1monthstudent';
        }


        $totalAmount = $priceList[$serviceType] ?? null;


        if (is_null($totalAmount)) {
            return response()->json(['error' => "Price for {$serviceType} not found."], 404);
        }

        $newService = new Service([
            'service_type' => $serviceType,
            'start_date' => $startDate,
            'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
            'amount' => $totalAmount,
            'month' => $months,
            'status' => 'Active',
            'service_id' => 'SRV-' . \Illuminate\Support\Str::random(10),
        ]);
        $member->services()->save($newService);

        $this->updateServiceStatus();
        return redirect()->back()->with('success', 'Subscription extended successfully.');
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

        return redirect()->back()->with('success', 'New locker rented successfully.');
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
        return redirect()->back()->with('success', 'New Treadmill rented successfully.');
    }

    public function generateQrCode(Member $member)
    {
        // Check if QR code already exists
        if ($member->qrcode) {
            return redirect()->back()->with('error', 'QR Code already exists for this member');
        }

        // Generate QR Code
        $qrData = $member->id_number; // Using member's ID number as QR data
        $qrCode = new QrCode($qrData);
        $qrCode->setSize(300)
            ->setMargin(10)
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
            ->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8'));

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // Generate unique filename
        $fileName = 'qrcode_' . $member->id_number . '_' . time() . '.png';

        // Save QR code image to storage
        $imagePath = 'public/qrcodes/' . $fileName;
        Storage::put($imagePath, $result->getString());

        // Create QR code record in database
        $member->qrcode()->create([
            'qr_image_path' => $fileName,
            'qr_data' => $qrData
        ]);

        return redirect()->back()->with('success', 'QR Code generated successfully!');
    }

    public function renew(Member $member)
    {
        $startDate = now();
        $dueDate = now()->addYear();

        if ($member->membershipDuration) {
            // Update existing membership duration
            $member->membershipDuration->update([
                'start_date' => $startDate,
                'due_date' => $dueDate,
                'status' => 'Active'
            ]);

            return redirect()->back()->with('success', 'Membership renewed successfully');
        } else {
            // Create a new membership duration if none exists
            $member->membershipDuration()->create([
                'start_date' => $startDate,
                'due_date' => $dueDate,
                'status' => 'Active'
            ]);

            return redirect()->back()->with('success', 'New membership created and activated successfully');
        }
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
            return redirect()->back()->with('error', 'Duplicate submission detected.');
        }
        return null; // Return null if there's no duplicate submission
    }

    public function getRelationStartDate($memberId, $relation): JsonResponse
    {
        if (!in_array($relation, ['services', 'lockers', 'treadmills'])) {
            return response()->json(['error' => 'Invalid relation type'], 400);
        }

        // Define the valid statuses that are not 'Ended'
        $validStatuses = ['Active', 'Inactive', 'Due', 'Overdue', 'Expired'];

        // Find the member and load the related model
        $member = Member::with([
            $relation => function ($query) use ($validStatuses) {
                // Filter records by valid statuses and order by due_date descending
                $query->whereIn('status', $validStatuses)
                    ->orderBy('due_date', 'desc');
            }
        ])->findOrFail($memberId);

        // Get the first valid record from the filtered results
        $latestRecord = $member->$relation->first();

        // Calculate the start date based on the latest valid record
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

}