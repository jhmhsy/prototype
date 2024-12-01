<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\Service;
use App\Models\Locker;
use App\Models\Treadmill;
class ConfirmationController extends Controller
{
    public function index()
    {


        if (!auth()->user()->can('confirmation-list')) {
            abort(404); // forbidden / not found
        }

        $pendingServices = Service::where('action_status', 'Pending')
            ->with('member') // Eager load the related member
            ->get();

        $pendingLockers = Locker::where('action_status', 'Pending')
            ->with('member')
            ->get();

        // Fetch pending treadmills with their related members
        $pendingTreadmills = Treadmill::where('action_status', 'Pending')
            ->with('member')
            ->get();


        $pendingMembers = Member::where('action_status', 'Pending')->with('membershipDuration')->get();

        return view('administrator.confirmation.index', compact('pendingServices', 'pendingLockers', 'pendingTreadmills', 'pendingMembers'));
    }

    public function approveServiceEnd(Service $service)
    {
        // Update service status to "Ended"
        $service->update([
            'action_status' => 'Suspended',
            'status' => 'Ended',
        ]);


        // Redirect to the confirmation page with success message
        return back()->with('success', 'Service has been approved and ended.');
    }

    public function diapproveServiceEnd(Service $service)
    {
        // Update service status to "Ended"
        $service->update(['action_status' => 'None']);


        return back()->with('success', 'Service has been Dissaproved to end.');
    }


    // Approve Locker End
    public function approveLockerEnd(Locker $locker)
    {

        // Update locker status to "Ended"
        $locker->update([
            'action_status' => 'Suspended',
            'status' => 'Ended',
        ]);
        // Redirect to the confirmation page with success message
        return back()->with('success', 'Locker has been approved and ended.');
    }

    // Disapprove Locker End
    public function disapproveLockerEnd(Locker $locker)
    {
        // Update locker status to "Active"
        $locker->update(['action_status' => 'None']);

        // Optionally, you can call a method here to handle additional logic when setting the status to Active

        return back()->with('success', 'Locker has been disapproved from ending.');
    }



    // Approve Treadmill End
    public function approveTreadmillEnd(Treadmill $treadmill)
    {
        // Update treadmill status to "Ended"
        $treadmill->update([
            'action_status' => 'Suspended',
            'status' => 'Ended',
        ]);

        // Redirect to the confirmation page with success message
        return back()->with('success', 'Treadmill has been approved and ended.');
    }

    // Disapprove Treadmill End
    public function disapproveTreadmillEnd(Treadmill $treadmill)
    {
        // Update treadmill status to "Active"
        $treadmill->update(['action_status' => 'None']);

        // Optionally, you can call a method here to handle additional logic when setting the status to Active

        return back()->with('success', 'Treadmill has been disapproved from ending.');
    }


    public function approveMemberEnd(Member $member)
    {
        $member->delete();

        return back()->with('success', 'Member Deletion has been approved');
    }



    // Disapprove Treadmill End
    public function disapproveMemberEnd(Member $member)
    {

        $member->update(['action_status' => 'None']);


        return back()->with('success', 'Member Deletion is disapproved.');
    }

}