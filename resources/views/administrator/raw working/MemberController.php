<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Models\Member;
use App\Models\Service;
use App\Models\Locker;
use App\Models\Treadmill;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Endroid\QrCode\ErrorCorrectionLevel;


class MemberController extends Controller
{

    public function index(Request $request)
    {
        $query = Member::with(['services', 'lockers', 'treadmills', 'qrcode']);

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


        $occupiedLockers = Locker::where('status', 'Active')->pluck('locker_no')->toArray();
        session()->put('form_token', uniqid());
        return view('administrator.members.index', compact('members', 'occupiedLockers'));
    }


    public function create()
    {
        $occupiedLockers = Locker::where('status', 'Active')->pluck('locker_no')->toArray();
        session()->put('form_token', uniqid());
        return view('administrator.members.create', compact('occupiedLockers'));
    }

    public function store(Request $request)
    {
        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        session()->forget('form_token');

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Service types must be present
            'service_type_1' => 'nullable|string|max:255',
            'service_type_2' => 'nullable|string|max:255',
            'service_type_3' => 'nullable|string|max:255',
            'service_type_4' => 'nullable|string|max:255',
            'start_date_1' => 'nullable|date',
            'start_date_2' => 'nullable|date',
            'start_date_3' => 'nullable|date',
            'start_date_4' => 'nullable|date',
            'month_1' => 'nullable|numeric|min:1',
            'month_2' => 'nullable|numeric|min:1',
            'month_3' => 'nullable|numeric|min:1',
            'month_4' => 'nullable|numeric|min:1',

            // Locker fields can be nullable
            'locker_start_date_1' => 'nullable|date',
            'locker_start_date_2' => 'nullable|date',
            'locker_start_date_3' => 'nullable|date',
            'locker_start_date_4' => 'nullable|date',
            'locker_no_1' => 'nullable|integer',
            'locker_no_2' => 'nullable|integer',
            'locker_no_3' => 'nullable|integer',
            'locker_no_4' => 'nullable|integer',
            'locker_month_1' => 'nullable|numeric|min:1',
            'locker_month_2' => 'nullable|numeric|min:1',
            'locker_month_3' => 'nullable|numeric|min:1',
            'locker_month_4' => 'nullable|numeric|min:1',

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


        // STORE SUBSCRIPTIONS
        for ($i = 1; $i <= 4; $i++) {
            if ($request->filled("service_type_{$i}") && $request->filled("start_date_{$i}")) {

                $months = intval($request->input("month_{$i}"));
                $startDate = $request->input("start_date_{$i}");

                $totalamount = $months * 999;

                $service = new Service([
                    'service_type' => $request->input("service_type_{$i}"),
                    'start_date' => $startDate,
                    'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
                    'amount' => $totalamount,
                    'month' => $months,
                    'status' => 'Active',
                    'service_id' => 'SRV-' . Str::random(10),
                ]);
                $member->services()->save($service);
            }
        }

        // STORE LOCKERS
        for ($i = 1; $i <= 4; $i++) {
            // Only create a locker if the start date is filled
            if ($request->filled("locker_start_date_{$i}")) {

                $months = intval($request->input("locker_month_{$i}"));
                $startDate = $request->input("locker_start_date_{$i}");

                $totalAmount = $months * 100;
                $member->lockers()->create([
                    'start_date' => $startDate,
                    'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
                    'amount' => $totalAmount,
                    'month' => $months,
                    'locker_no' => $request->input("locker_no_{$i}"),
                    'status' => 'Active',
                ]);
            }
        }

        // STORE TREADMILLS
        if ($request->filled("treadmill_start_date")) {
            $months = intval($request->input("treadmill_months"));
            $startDate = $request->input("treadmill_start_date");

            $totalamount = $months * 200;
            $member->treadmills()->create([
                'start_date' => $startDate,
                'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
                'month' => $months,
                'amount' => $totalamount,
                'status' => 'Active',
            ]);
        }

        $this->updateServiceStatus();
        $this->updateLockerStatus();

        return redirect()->back()->with([
            'success' => 'Member registered successfully with services and lockers!',
            'qrCodeUrl' => Storage::url('qrcodes/' . $fileName)
        ]);
    }

    private function calculateDueDate($startDate, $serviceType, $months = 1)
    {
        $start = \Carbon\Carbon::parse($startDate);

        return $serviceType === 'Monthly' ? $start->addMonths($months) : $start->addYears($months);
    }


    public function extend(Request $request, $id)
    {
        //check for duplicate submission
        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        session()->forget('form_token');

        $request->validate([
            'service_type' => 'required|in:Monthly,Yearly',
            'start_date' => 'required|date',
            'month' => 'required|numeric|min:1|max:12',
        ]);
        $member = Member::findOrFail($id);

        $service_type = $request->service_type;
        $startDate = $request->start_date;
        $months = intval($request->input("month"));


        $totalamount = $months * 999;
        $newService = new Service([
            'service_type' => $service_type,
            'start_date' => $startDate,
            'due_date' => $this->calculateDueDate($startDate, $service_type, $months), // Pass months here
            'amount' => $totalamount,
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

        $request->validate([
            'locker_no' => 'required|string',
            'start_date' => 'required|date',
            'month' => 'required|numeric|min:1|max:12',
        ]);

        $member = Member::findOrFail($id);
        $months = intval($request->input("month"));
        $startDate = $request->input("start_date");

        $totalamount = $months * 100;
        $newLocker = new Locker([
            'start_date' => $startDate,
            'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
            'amount' => $totalamount,
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

        $request->validate([
            'start_date' => 'nullable|date',
            'month' => 'nullable|integer|min:1|max:12', // Assuming 12 is the max
        ]);

        $member = Member::findOrFail($id);
        $startDate = $request->input("start_date");
        $months = intval($request->input("month"));
        $totalamount = $months * 200;

        $newTreadmill = new Treadmill([
            'start_date' => $startDate,
            'due_date' => $this->calculateDueDate($startDate, 'Monthly', $months), // Pass months here
            'month' => $months,
            'amount' => $totalamount,
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

        $member = Member::with([
            $relation => function ($query) {
                $query->orderBy('due_date', 'desc');
            }
        ])->findOrFail($memberId);

        $latestRecord = $member->$relation->first();

        $startDate = $latestRecord
            ? Carbon::parse($latestRecord->due_date)->addDay()->format('Y-m-d')
            : Carbon::now()->format('Y-m-d');

        return response()->json(['start_date' => $startDate]);
    }
}