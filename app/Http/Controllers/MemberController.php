<?php

namespace App\Http\Controllers;

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

        return view('administrator.members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service_type' => 'required|in:Monthly,Yearly',
            'start_date' => 'required|date',
            'amount' => 'required|numeric',
            'locker_start_date' => 'required|date',
            'locker_no' => 'required:numeric',
            'locker_amount' => 'required|numeric',
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

        // Create service
        $service = new Service([
            'service_type' => $request->service_type,
            'start_date' => $request->start_date,
            'due_date' => $this->calculateDueDate($request->start_date, $request->service_type),
            'amount' => $request->amount,
            'status' => 'Active',
            'service_id' => 'SRV-' . Str::random(10),
        ]);

        $member->services()->save($service);

        // Create locker
        $locker = new Locker([
            'start_date' => $request->locker_start_date,
            'due_date' => $this->calculateDueDate($request->locker_start_date, 'Monthly'),
            'amount' => $request->locker_amount,
            'locker_no' => $request->locker_no,
            'status' => 'Active',
        ]);

        $member->lockers()->save($locker);

        return redirect()->back()->with('success', 'Member registered successfully with service and locker!');
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

        return redirect()->back()->with('success', 'Subscription extended successfully.');
    }

    public function rentLocker(Request $request, $id)
    {
        $request->validate([
            'locker_no' => 'required|string',
            'start_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        $member = Member::findOrFail($id);

        $startDate = Carbon::parse($request->start_date);
        $dueDate = $startDate->copy()->addMonth(); // Assuming locker rental is monthly

        $newLocker = new Locker([
            'locker_no' => $request->locker_no,
            'start_date' => $startDate->toDateString(),
            'due_date' => $dueDate->toDateString(),
            'amount' => $request->amount,
            'status' => 'Active',
        ]);

        $member->lockers()->save($newLocker);

        return redirect()->back()->with('success', 'New locker rented successfully.');
    }
}