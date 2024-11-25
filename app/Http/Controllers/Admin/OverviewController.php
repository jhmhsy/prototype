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
use App\Models\Locker;
use App\Models\Treadmill;

class OverviewController extends Controller
{
    public function index()
    {

        if (!auth()->user()->canany(['overview-list'])) {
            abort(404); // forbidden / not found
        }

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $currentMonthName = Carbon::now()->format('F');
        $currentYearName = Carbon::now()->format('Y');

        try {
            $members = Member::count();
            $subscription = Service::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->count();
            $oneMonth = Service::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('service_type', '1month')
                ->count();
            $oneMonthStudent = Service::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('service_type', '1monthstudent')
                ->count();
            $threeMonth = Service::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('service_type', '3month')
                ->count();
            $sixMonth = Service::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('service_type', '6month')
                ->count();
            $twelveMonth = Service::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('service_type', '12month')
                ->count();
            $walkinMonth = Service::whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->where('service_type', 'WalkinService')
                ->count();

            $yearlySubscription = Service::whereYear('created_at', $currentYear)
                ->count();
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


        // MONTHLY MEMBERSHIP -----------------------------------------------------------------------------------------------------
        $monthlyMemberships = Member::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Ensure all months are represented
        $yearlyMembershipData = [];
        for ($i = 1; $i <= 12; $i++) {
            $yearlyMembershipData[$i] = $monthlyMemberships[$i] ?? 0;
        }

        //MONTHLY SERVICES ( SERVICE  /  locker  / treadmill  ) -------------------------------------------------------------------

        $monthlyServices = Service::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Fetch monthly data for Lockers
        $monthlyLockers = Locker::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Fetch monthly data for Treadmills
        $monthlyTreadmills = Treadmill::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupByRaw('MONTH(created_at)')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Ensure all months are represented
        $yearlyServicesData = [];
        $yearlyLockersData = [];
        $yearlyTreadmillsData = [];

        for ($i = 1; $i <= 12; $i++) {
            $yearlyServicesData[$i] = $monthlyServices[$i] ?? 0;
            $yearlyLockersData[$i] = $monthlyLockers[$i] ?? 0;
            $yearlyTreadmillsData[$i] = $monthlyTreadmills[$i] ?? 0;
        }



        return view('administrator.overview.index', compact(
            'members',
            'subscription',
            'totalBooking',
            'totalFeedbackRating',
            'yearlyData',
            'currentYear',
            'currentMonthName',
            'latestCheckins',
            'latestMembers',
            'yearlyMembershipData',
            'currentYear',
            'yearlyServicesData',
            'yearlyLockersData',
            'yearlyTreadmillsData',
            'currentMonthName',
            'currentYearName',
            'yearlySubscription',
            'oneMonth',
            'oneMonthStudent',
            'threeMonth',
            'sixMonth',
            'twelveMonth',
            'walkinMonth'

        ));

    }
}