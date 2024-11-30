<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Service;
use App\Models\Locker;
use App\Models\Treadmill;
use App\Models\Prices;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MembersExport;
use App\Exports\ServicesExport;
use App\Exports\LockersExport;
use App\Exports\TreadmillsExport;


class AssetController extends Controller
{
    // App\Http\Controllers\Administrator\AssetController.php

    // App\Http\Controllers\Administrator\AssetController.php

    public function index(Request $request)
    {
        if (!auth()->user()->can('asset-list')) {
            abort(404); // forbidden / not found
        }


        $filter = $request->input('filter', 'services'); // Default to 'services'
        $status = $request->input('status', null);       // Default to null (no status filter)

        if ($filter === 'services') {
            $query = Service::with('member');
        } elseif ($filter === 'lockers') {
            $query = Locker::with('member');
        } elseif ($filter === 'treadmills') {
            $query = Treadmill::with('member');
        } else {
            $filter = 'services'; // Fallback to 'services' if filter is invalid
            $query = Service::with('member');
        }

        if ($status) {
            $query->where('status', $status);
        }

        $data = $query->get();

        return view('administrator.asset.index', compact('data', 'filter', 'status'));
    }



    public function exportMembers()
    {
        return Excel::download(new MembersExport, 'members.xlsx');
    }
    public function exportServices()
    {
        return Excel::download(new ServicesExport, 'services.xlsx');
    }

    public function exportLockers()
    {
        return Excel::download(new LockersExport, 'lockers.xlsx');
    }
    public function exportTreadmills()
    {
        return Excel::download(new TreadmillsExport, 'treadmills.xlsx');
    }

    public function export()
    {
        if (!auth()->user()->can('dailysales-list')) {
            abort(404);
        }

        $today = now()->toDateString();

        // Fetch prices and map them by service type
        $prices = Prices::all();
        $priceData = $prices->keyBy('service_type')->mapWithKeys(function ($item) {
            return [$item->service_type => $item->price];
        });

        // Fetch and total all services bought today, group by service type
        $custom1month = Service::whereDate('created_at', $today)->where('service_type', '1month')->sum('amount');
        $custom1monthstudent = Service::whereDate('created_at', $today)->where('service_type', '1monthstudent')->sum('amount');
        $custom3month = Service::whereDate('created_at', $today)->where('service_type', '3month')->sum('amount');
        $custom6month = Service::whereDate('created_at', $today)->where('service_type', '6month')->sum('amount');
        $custom12month = Service::whereDate('created_at', $today)->where('service_type', '12month')->sum('amount');
        $customWalkinService = Service::whereDate('created_at', $today)->where('service_type', 'WalkinService')->sum('amount');

        // Fetch total amount for lockers and treadmills
        $lockerAmount = Locker::whereDate('created_at', $today)->sum('amount');
        $treadmillAmount = Treadmill::whereDate('created_at', $today)->sum('amount');

        // Fetch total amount for Regular and Walkin memberships
        $regularMembershipAmount = Member::whereDate('created_at', $today)
            ->where('membership_type', 'Regular')
            ->sum('amount');

        $walkinMembershipAmount = Member::whereDate('created_at', $today)
            ->where('membership_type', 'Walkin')
            ->sum('amount');

        $manualMembershipAmount = Member::whereDate('created_at', $today)
            ->where('membership_type', 'Manual')
            ->sum('amount');

        // Calculate total sales
        $totalSales = $lockerAmount + $treadmillAmount + $custom1month + $custom1monthstudent + $custom3month + $custom6month + $custom12month + $customWalkinService + $regularMembershipAmount + $walkinMembershipAmount + $manualMembershipAmount;

        // Prepare data to be exported
        $data = [

            ['Type' => 'Regular Membership', 'Amount' => $regularMembershipAmount],
            ['Type' => 'Walkin Membership', 'Amount' => $walkinMembershipAmount],
            ['Type' => 'Manual Membership', 'Amount' => $manualMembershipAmount],
            ['Type' => '1 Month', 'Amount' => $custom1month],
            ['Type' => '1 Month (Student)', 'Amount' => $custom1monthstudent],
            ['Type' => '3 Months', 'Amount' => $custom3month],
            ['Type' => '6 Months', 'Amount' => $custom6month],
            ['Type' => '12 Months', 'Amount' => $custom12month],
            ['Type' => 'Walk-in Service', 'Amount' => $customWalkinService],
            ['Type' => 'Lockers', 'Amount' => $lockerAmount],
            ['Type' => 'Treadmills', 'Amount' => $treadmillAmount],
            ['Type' => 'TOTAL', 'Amount' => $totalSales]
        ];

        // Download Excel with the daily sales data
        return Excel::download(
            new \App\Exports\DailySalesExport($data),
            'daily_sales_' . now()->format('Y-m-d') . '.xlsx'
        );
    }



}