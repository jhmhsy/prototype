<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Member;
use App\Models\Service;
use App\Models\Locker;
use App\Models\Treadmill;

class SideNavigationDataProvider extends ServiceProvider
{
    public function boot()
    {
        // Share the $totalPendings with the side-navigation view
        View::composer('administrator.side-navigation', function ($view) {
            // Count pending rows in each table
            $servicePendings = Service::where('action_status', 'Pending')->count();
            $lockerPendings = Locker::where('action_status', 'Pending')->count();
            $treadmillPendings = Treadmill::where('action_status', 'Pending')->count();
            $memberPendings = Member::where('action_status', 'Pending')->count();

            // Total pending is the sum of the counts from each table
            $totalPendings = $servicePendings + $lockerPendings + $treadmillPendings + $memberPendings;

            // Pass the totalPendings to the view
            $view->with('totalPendings', $totalPendings);
        });
    }


    public function register()
    {
        //
    }
}