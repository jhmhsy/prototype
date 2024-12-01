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
        \App\Http\Middleware\CustomThrottleMiddleware::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array   
     */
    protected $routeMiddleware = [
        // Other middleware...
        'custom.throttle' => \App\Http\Middleware\CustomThrottleMiddleware::class,


    ];

    protected function schedule(Schedule $schedule)
    {
        
        $schedule->command('locker:update-status')->everyThirtyMinutes();

        $schedule->command('app:service-due-reminder')->everyThirtyMinutes();

        $schedule->command('events:update-status')->everyThirtyMinutes();
    }

}