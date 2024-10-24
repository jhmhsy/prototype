<?php

namespace App\Console;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel; // {{ edit_1 }}

class Kernel extends ConsoleKernel
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
        'admin' => \App\Http\Middleware\isAdmin::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('locker:update-status')->everyMinute();

        $schedule->command('service:update-status')->everyMinute();
    }


}