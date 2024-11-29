<?php

namespace App\Http\Controllers;

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


    public function exportdailysales()
    {
        if (!auth()->user()->can('dailysales-list')) {
            abort(404);
        }

        $today = now()->toDateString();

        $prices = Prices::all();
        $priceData = $prices->keyBy('service_type')->mapWithKeys(function ($item) {
            return [$item->service_type => $item->price];
        });

        $memberCounts = Member::whereDate('created_at', $today)
            ->selectRaw('membership_type, COUNT(*) as count')
            ->groupBy('membership_type')
            ->pluck('count', 'membership_type')
            ->toArray();

        $serviceCounts = Service::whereDate('created_at', $today)
            ->selectRaw('service_type, COUNT(*) as count')
            ->groupBy('service_type')
            ->pluck('count', 'service_type')
            ->toArray();

        $lockerAmount = Locker::whereDate('created_at', $today)->sum('amount');
        $treadmillAmount = Treadmill::whereDate('created_at', $today)->sum('amount');

        $defaultServiceTypes = ['1month', '1monthstudent', '3month', '6month', '12month', 'WalkinService'];
        $serviceCounts = array_merge(array_fill_keys($defaultServiceTypes, 0), $serviceCounts);

        $totalMemberAmount =
            ($priceData['Walk-in'] * $memberCounts['Walkin']) +
            ($priceData['Regular'] * $memberCounts['Regular']);

        $totalServiceAmount = 0;
        foreach (['1month', '1monthstudent', '3month', '6month', '12month', 'WalkinService'] as $serviceType) {
            $totalServiceAmount += ($priceData[$serviceType] ?? 0) * ($serviceCounts[$serviceType] ?? 0);
        }

        $totalSales = $totalMemberAmount + $totalServiceAmount + $lockerAmount + $treadmillAmount;

        return Excel::download(
            new \App\Exports\DailySalesExport(
                $serviceCounts,
                $priceData,
                $memberCounts,
                $lockerAmount,
                $treadmillAmount,
                $totalSales
            ),
            'daily_sales_' . now()->format('Y-m-d') . '.xlsx'
        );
    }


}