<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Feedback;
use App\Models\PendingBooking;
use App\Models\RejectedBooking;
use App\Models\User;
use App\Models\CheckinRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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



        // MONTHLY CHECKIN TIMESTAMP TO CHART
        $currentYear = Carbon::now()->year;
        $monthlyCheckins = CheckinRecord::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_checkins')
        )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $yearlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $yearlyData[$i] = 0;
        }
        foreach ($monthlyCheckins as $record) {
            $yearlyData[$record->month] = $record->total_checkins;
        }

        // latest 3 checkins in the checkin records
        $latestCheckins = CheckinRecord::with('member:id,name,email')
            ->orderBy('checkin_date', 'desc')
            ->orderBy('checkin_time', 'desc')
            ->take(3)
            ->get();

        // Assign custom rank to latest = 1st
        $latestCheckins = $latestCheckins->map(function ($checkin, $index) {
            $checkin->rank = $index + 1;  // Rank starts from 1
            return $checkin;
        });

        // latest 3 checkins in the Member added
        $latestMembers = Member::select('id', 'name', 'membership_type', 'email', 'phone')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Assign custom rank to latest = 1st
        $latestMembers = $latestMembers->map(function ($member, $index) {
            $member->rank = $index + 1;  // Rank starts from 1
            return $member;
        });


        return view('administrator.overview.index', compact(
            'members',
            'subscription',
            'totalBooking',
            'totalFeedbackRating',
            'yearlyData',
            'currentYear',
            'latestCheckins',
            'latestMembers'
        ));

    }
}