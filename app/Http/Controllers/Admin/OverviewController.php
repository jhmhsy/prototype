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

        $currentYear = Carbon::now()->year;

        // Get checkins for all months of current year
        $monthlyCheckins = CheckinRecord::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total_checkins')
        )
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize array for all 12 months
        $yearlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $yearlyData[$i] = 0;
        }

        // Fill in actual data
        foreach ($monthlyCheckins as $record) {
            $yearlyData[$record->month] = $record->total_checkins;
        }

        return view('administrator.overview.index', compact(
            'members',
            'subscription',
            'totalBooking',
            'totalFeedbackRating',
            'yearlyData',
            'currentYear'
        ));

    }
}