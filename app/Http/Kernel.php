<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Console\Scheduling\Schedule;
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        // Global middleware
    ];

    /**
     * The application's route middleware.
     *
     * @var array   
     */
    protected $routeMiddleware = [
        // Other middleware...

    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('locker:update-status')->everySecond();

        $schedule->command('app:service-due-reminder')->everyTwoSeconds();
    }

}