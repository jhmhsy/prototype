<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\PendingBooking;
use App\Models\RejectedBooking;
use App\Models\User;

use App\Models\Member;
use App\Models\Service;

class OverviewController extends Controller
{
    public function index()
    {

        if (!auth()->user()->canany(['overview-list'])) {
            abort(404); // forbidden / not found
        }

        try {
            $members = Member::count();
            $subscription = Service::count();
            $totalBooking = Booking::count() + RejectedBooking::count() + PendingBooking::count();
            $totalFeedbackRating = Feedback::whereBetween('rating', [3, 5])->count();
            //$sales =
        } catch (\Exception $e) {
            $data = 0;
            $members = 0;
            $subscription = 0;
            $totalBooking = 0;
            $totalFeedbackRating = 0;
        }
        return view('administrator.overview.index', compact('members', 'subscription', 'totalBooking', 'totalFeedbackRating'));
    }
}