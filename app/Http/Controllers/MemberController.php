<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use App\Models\Member;
use App\Models\Service;
use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;


class MemberController extends Controller
{

    public function index()
    {
        $members = Member::with(['services', 'lockers'])->get();
        $occupiedLockers = Locker::where('status', 'Active')->pluck('locker_no')->toArray();
        return view('administrator.members.index', compact('members', 'occupiedLockers'));
    }

    public function create()
    {
        $occupiedLockers = Locker::where('status', 'Active')->pluck('locker_no')->toArray();
        return view('administrator.members.create', compact('occupiedLockers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // Service types must be present
            'service_type_1' => 'required|string|max:255',
            'service_type_2' => 'nullable|string|max:255',
            'service_type_3' => 'nullable|string|max:255',
            'service_type_4' => 'nullable|string|max:255',
            // Locker fields can be nullable
            'locker_start_date_1' => 'nullable|date',
            'locker_start_date_2' => 'nullable|date',
            'locker_start_date_3' => 'nullable|date',
            'locker_start_date_4' => 'nullable|date',
            'locker_no_1' => 'nullable|integer',
            'locker_no_2' => 'nullable|integer',
            'locker_no_3' => 'nullable|integer',
            'locker_no_4' => 'nullable|integer',
            'locker_amount_1' => 'nullable|numeric',
            'locker_amount_2' => 'nullable|numeric',
            'locker_amount_3' => 'nullable|numeric',
            'locker_amount_4' => 'nullable|numeric',
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


        // Handle multiple subscriptions (up to 4)
        for ($i = 1; $i <= 4; $i++) {
            if ($request->has("service_type_{$i}")) {
                $service = new Service([
                    'service_type' => $request->input("service_type_{$i}"),
                    'start_date' => $request->input("start_date_{$i}"),
                    'due_date' => $this->calculateDueDate($request->input("start_date_{$i}"), $request->input("service_type_{$i}")),
                    'amount' => $request->input("amount_{$i}"),
                    'status' => 'Active',
                    'service_id' => 'SRV-' . Str::random(10),
                ]);
                $member->services()->save($service);
            }
        }

        // Save lockers
        for ($i = 1; $i <= 4; $i++) {
            // Only create a locker if the start date is filled
            if ($request->filled("locker_start_date_{$i}")) {
                $member->lockers()->create([
                    'start_date' => $request->input("locker_start_date_{$i}"),
                    'due_date' => $this->calculateDueDate($request->input("locker_start_date_{$i}"), 'Monthly'),
                    'amount' => $request->input("locker_amount_{$i}"),
                    'locker_no' => $request->input("locker_no_{$i}"),
                    'status' => 'Active',
                ]);
            }
        }
        $this->updateServiceStatus();
        return redirect()->back()->with('success', 'Member registered successfully with services and lockers!');
    }

    private function calculateDueDate($startDate, $serviceType)
    {
        $start = \Carbon\Carbon::parse($startDate);
        return $serviceType === 'Monthly' ? $start->addMonth() : $start->addYear();
    }

    public function extend(Request $request, $id)
    {
        $request->validate([
            'service_type' => 'required|in:Monthly,Yearly',
            'start_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        $member = Member::findOrFail($id);

        $startDate = Carbon::parse($request->start_date);
        $dueDate = $request->service_type === 'Monthly'
            ? $startDate->copy()->addMonth()
            : $startDate->copy()->addYear();

        $newService = new Service([
            'service_type' => $request->service_type,
            'start_date' => $startDate->toDateString(),
            'due_date' => $dueDate->toDateString(),
            'amount' => $request->amount,
            'status' => 'Active',
            'service_id' => 'SRV-' . \Illuminate\Support\Str::random(10),
        ]);

        $member->services()->save($newService);

        $this->updateServiceStatus();

        return redirect()->back()->with('success', 'Subscription extended successfully.');
    }

    public function rentLocker(Request $request, $id)
    {
        $request->validate([
            'locker_no' => 'required|string',
            'start_date' => 'required|date',
        ]);

        $member = Member::findOrFail($id);

        $startDate = Carbon::parse($request->start_date);
        $dueDate = $startDate->copy()->addMonth(); // Assuming locker rental is monthly

        $newLocker = new Locker([
            'locker_no' => $request->locker_no,
            'start_date' => $startDate->toDateString(),
            'due_date' => $dueDate->toDateString(),
            'amount' => 100,
            'status' => 'Active',
        ]);

        $member->lockers()->save($newLocker);

        $this->updateLockerStatus();

        return redirect()->back()->with('success', 'New locker rented successfully.');
    }





    public function UpdateServiceStatus()
    {
        Artisan::call('service:update-status');
    }
    public function updateLockerStatus()
    {
        Artisan::call('locker:update-status');
    }


}