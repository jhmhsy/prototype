<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\PendingBooking;
use App\Models\RejectedBooking;
use App\Models\User;

class OverviewController extends Controller
{
    public function index()
    {
        try {
            $users = User::count();
            $totalBooking = Booking::count() + RejectedBooking::count() + PendingBooking::count();
            $totalFeedbackRating = Feedback::whereBetween('rating', [3, 5])->count();
            //$sales =
        } catch (\Exception $e) {
            $users = 0;
            $totalBooking = 0;
            $totalFeedbackRating = 0;
        }
        return view('administrator.overview.index', compact('users', 'totalBooking', 'totalFeedbackRating'));
    }
}
