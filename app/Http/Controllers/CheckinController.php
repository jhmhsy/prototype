<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\CheckinRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckinController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query()->with(['services', 'lockers']);

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('id_number', 'like', '%' . $searchTerm . '%')
                    ->orWhere('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('name', 'like', '%' . $searchTerm . '%');
            });
        }



        // Get paginated results
        $members = $query->paginate(10);
        $membersCount = $members->count();

        // Process each member's subscription status
        foreach ($members as $member) {
            // Initialize subscription status flags
            $member->hasSubscriptions = false;
            $member->hasOverdueSubscription = false;
            $member->hasValidSubscription = false;

            // Check services
            foreach ($member->services as $service) {
                $member->hasSubscriptions = true; // Has at least one service

                if ($service->status === 'Overdue') {
                    $member->hasOverdueSubscription = true;
                }
                if (in_array($service->status, ['Due', 'Active', 'Inactive'])) {
                    $member->hasValidSubscription = true;
                }
            }

            // Check lockers
            foreach ($member->lockers as $locker) {
                $member->hasSubscriptions = true; // Has at least one locker

                if ($locker->status === 'Overdue') {
                    $member->hasOverdueSubscription = true;
                }
                if (in_array($locker->status, ['Due', 'Active', 'Inactive'])) {
                    $member->hasValidSubscription = true;
                }
            }
        }

        return view('administrator.checkin.index', compact('members', 'membersCount'));
    }

    public function checkin(Request $request, Member $member)
    {
        $now = Carbon::now();

        // Check if the member has already checked in today
        $alreadyCheckedIn = CheckinRecord::where('user_id', $member->id)
            ->whereDate('checkin_date', $now->toDateString())
            ->exists();

        if ($alreadyCheckedIn) {
            return redirect()->back()->with('error', 'You have already checked in today.');
        }

        // Load relationships if not already loaded
        $member->load(['services', 'lockers']);

        // Check if user has any subscriptions
        $hasSubscriptions = $member->services->count() > 0 || $member->lockers->count() > 0;

        if (!$hasSubscriptions) {
            return redirect()->back()->with('error', 'Cannot check in: No active subscriptions found.');
        }

        // Check if this is a forced check-in for overdue subscription
        $forceCheckin = $request->input('force_checkin', false);

        // Check subscription statuses
        $hasValidSubscription = false;
        $hasOverdueSubscription = false;

        // Check services
        foreach ($member->services as $service) {
            if (in_array($service->status, ['Due', 'Active', 'Inactive'])) {
                $hasValidSubscription = true;
            }
            if ($service->status === 'Overdue') {
                $hasOverdueSubscription = true;
            }
        }

        // Check lockers
        foreach ($member->lockers as $locker) {
            if (in_array($locker->status, ['Due', 'Active', 'Inactive'])) {
                $hasValidSubscription = true;
            }
            if ($locker->status === 'Overdue') {
                $hasOverdueSubscription = true;
            }
        }

        // If has overdue subscription and not forcing check-in, return with warning
        if ($hasOverdueSubscription && !$forceCheckin) {
            return redirect()->back()->with([
                'warning' => true,
                'member_id' => $member->id,
                'message' => 'Warning: User has overdue subscriptions.'
            ]);
        }

        // If no valid subscription and no force check-in, prevent check-in
        if (!$hasValidSubscription && !$forceCheckin) {
            return redirect()->back()->with('error', 'Cannot check in: No valid subscription found.');
        }

        // Proceed with check-in
        CheckinRecord::create([
            'user_id' => $member->id,
            'type' => 'walking',
            'checkin_time' => $now->toTimeString(),
            'checkin_date' => $now->toDateString(),
        ]);

        return redirect()->back()->with('success', 'Check-in recorded successfully.');
    }


    public function history(Request $request)
    {
        $query = CheckinRecord::query()->with('member');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('member', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('id_number', 'like', '%' . $search . '%');
            });
        }

        $sort = $request->input('sort', 'desc');
        $query->orderBy('checkin_date', $sort)->orderBy('checkin_time', $sort);

        $checkins = $query->paginate(15);

        return view('administrator.checkin.history', compact('checkins', 'sort'));
    }
}