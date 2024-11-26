<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use App\Models\MembershipDuration;
use App\Models\Service;
use App\Models\Locker;
use App\Models\Treadmill;
use App\Models\Prices;
use Illuminate\Support\Arr;

class DailysalesController extends Controller
{
    public function index()
    {


        if (!auth()->user()->can('dailysales-list')) {
            abort(404); // forbidden / not found
        }

        // Get members whose 'created_at' is today or have services, lockers, or treadmills created today
        $members = Member::whereDate('created_at', today())
            ->with([
                'services' => function ($query) {
                    // Only fetch services created today
                    $query->whereDate('created_at', today());
                },
                'lockers' => function ($query) {
                    // Only fetch lockers created today
                    $query->whereDate('created_at', today());
                },
                'treadmills' => function ($query) {
                    // Only fetch treadmills created today
                    $query->whereDate('created_at', today());
                }
            ])
            ->get();

        // Prepare the data structure to display
        $data = [];
        foreach ($members as $member) {
            $totalAmount = 0;
            $memberData = [
                'name' => $member->name,
                'details' => []
            ];

            // Add services
            foreach ($member->services as $service) {
                $memberData['details'][] = [
                    'type' => $service->service_type,
                    'amount' => $service->amount,
                ];
                $totalAmount += $service->amount;
            }

            // Add lockers
            foreach ($member->lockers as $locker) {
                $memberData['details'][] = [
                    'type' => 'Locker No#' . $locker->locker_no,
                    'amount' => $locker->amount,
                ];
                $totalAmount += $locker->amount;
            }

            // Add treadmills
            foreach ($member->treadmills as $treadmill) {
                $memberData['details'][] = [
                    'type' => 'Treadmill',
                    'amount' => $treadmill->amount,
                ];
                $totalAmount += $treadmill->amount;
            }

            // Add total amount
            $memberData['totalAmount'] = $totalAmount;

            // Add this member's data to the final data structure
            $data[] = $memberData;
        }



        $prices = Prices::all();
        $priceData = $prices->keyBy('service_type')->mapWithKeys(function ($item) {
            return [$item->service_type => $item->price];
        });


        $today = now()->toDateString();

        // Member counts and total amount
        $memberCounts = Member::whereDate('created_at', $today)
            ->selectRaw('membership_type, COUNT(*) as count, SUM(amount) as total_amount')
            ->groupBy('membership_type')
            ->pluck('total_amount', 'membership_type')
            ->toArray();

        // Service counts and total amount
        $serviceCounts = Service::whereDate('created_at', $today)
            ->selectRaw('service_type, COUNT(*) as count, SUM(amount) as total_amount')
            ->groupBy('service_type')
            ->pluck('total_amount', 'service_type')
            ->toArray();

        // Locker counts and total amount (if applicable)
        $lockerAmount = Locker::whereDate('created_at', $today)->sum('amount');

        // Treadmill counts and total amount (if applicable)
        $treadmillAmount = Treadmill::whereDate('created_at', $today)->sum('amount');

        // Total sales calculation
        $totalMemberAmount = array_sum($memberCounts); // Sum of all member-related amounts
        $totalServiceAmount = array_sum($serviceCounts); // Sum of all service-related amounts
        $totalLockerAmount = $lockerAmount; // Total from lockers
        $totalTreadmillAmount = $treadmillAmount; // Total from treadmills

        // Total sales for the day
        $totalSales = $totalMemberAmount + $totalServiceAmount + $totalLockerAmount + $totalTreadmillAmount;

        // Default member types and service types for consistency
        $defaultMemberTypes = ['Regular' => 0, 'Student' => 0, 'Walkin' => 0, 'Manual' => 0];
        $defaultServiceTypes = ['1month', '1monthstudent', '3month', '6month', '12month', 'WalkinService'];

        // Merge fetched counts with defaults for missing types
        $memberCounts = array_merge($defaultMemberTypes, Arr::only($memberCounts, array_keys($defaultMemberTypes)));
        $serviceCounts = array_merge(array_fill_keys($defaultServiceTypes, 0), $serviceCounts);
        // Pass the data to the view
        return view('administrator.dailysales.index', compact('priceData', 'data', 'memberCounts', 'serviceCounts', 'lockerAmount', 'treadmillAmount', 'totalSales'));

    }

}