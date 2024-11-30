<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Member;

use App\Mail\CheckinOverdueMail;
use App\Models\CheckinRecord;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;

class CheckinController extends Controller
{


    public function checkin(Request $request, Member $member)
    {
        $now = Carbon::now();

        // Check if the member has already checked in today
        $alreadyCheckedIn = CheckinRecord::where('user_id', $member->id)
            ->whereDate('checkin_date', $now->toDateString())
            ->exists();

        if ($alreadyCheckedIn) {
            return redirect()->back()->with('error', "You've already checked in today.");
        }

        // Load relationships if not already loaded
        $member->load(['services', 'lockers', 'treadmills']); // Added 'treadmills'

        // Check if user has any subscriptions
        $hasSubscriptions = $member->services->count() > 0 || $member->lockers->count() > 0 || $member->treadmills->count() > 0;

        if (!$hasSubscriptions) {
            return redirect()->back()->with('error', 'Invalid! No active subscriptions found.');
        }

        // Check if this is a forced check-in for overdue subscription
        $forceCheckin = $request->input('force_checkin', false);

        // Check for overdue subscriptions
        $hasOverdueSubscription = $member->services->contains(fn($service) => $service->status === 'Overdue') ||
            $member->lockers->contains(fn($locker) => $locker->status === 'Overdue') ||
            $member->treadmills->contains(fn($treadmill) => $treadmill->status === 'Overdue');

        // Handle overdue subscription logic
        if ($hasOverdueSubscription) {
            // Pass all relevant overdue details (lockers, services, treadmills) to the email
            $overdueLockers = $member->lockers->where('status', 'Overdue');
            $overdueServices = $member->services->where('status', 'Overdue');
            $overdueTreadmills = $member->treadmills->where('status', 'Overdue');


            // Send the overdue email with all necessary data
            Mail::to(config('app.superadminemail'))->send(new CheckinOverdueMail($member, $overdueLockers, $overdueServices, $overdueTreadmills));
        }
        // If has overdue subscription and not forcing check-in, return with warning
        if ($hasOverdueSubscription && !$forceCheckin) {
            return redirect()->back()->with([
                'warning' => true,
                'member_id' => $member->id,
                'message' => 'Warning: User subscription overdue'
            ]);
        }

        // Check subscription statuses
        $hasValidSubscription = false;

        // Check services
        foreach ($member->services as $service) {
            if (in_array($service->status, ['Due', 'Impending', 'Active', 'Pre-paid'])) {
                $hasValidSubscription = true;
            }
        }

        // Check lockers
        foreach ($member->lockers as $locker) {
            if (in_array($locker->status, ['Due', 'Impending', 'Active', 'Pre-paid'])) {
                $hasValidSubscription = true;
            }
        }

        // Check treadmills
        foreach ($member->treadmills as $treadmill) {
            if (in_array($treadmill->status, ['Due', 'Impending', 'Active', 'Pre-paid'])) {
                $hasValidSubscription = true;
            }
        }

        // If no valid subscription and no force check-in, prevent check-in
        if (!$hasValidSubscription && !$forceCheckin) {
            return redirect()->back()->with('error', 'Invalid! No active subscription found.');
        }

        // Proceed with check-in
        CheckinRecord::create([
            'user_id' => $member->id,
            'type' => $member->membership_type,
            'checkin_time' => $now->toTimeString(),
            'checkin_date' => $now->toDateString(),
        ]);

        return redirect()->back()->with('success', 'Check-in success!.');
    }



    public function history(Request $request)
    {

        if (!auth()->user()->canany(['checkin-log-list'])) {
            abort(404); // forbidden / not found
        }

        $query = CheckinRecord::query()->with('member');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('member', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('id_number', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%');
            });
        }

        $sort = $request->input('sort', 'desc');
        $query->orderBy('checkin_date', $sort)->orderBy('checkin_time', $sort);

        $checkins = $query->paginate(15);

        return view('administrator.checkin.history', compact('checkins', 'sort'));
    }
}