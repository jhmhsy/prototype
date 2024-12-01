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

    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('locker:update-status')->everyMinute();

        $schedule->command('service:update-status')->everyMinute();

        $schedule->command('treadmill:update-status')->everyMinute();

        $schedule->command('membership:update-status')->everyMinute();

        $schedule->command('app:service-due-reminder')->everyThirtyMinutes();

        $schedule->command(' app:locker-treadmill-reminder')->everyThirtyMinutes();

        $schedule->command(' app:membership-reminder')->everyTwoSeconds();

        $schedule->command('events:update-status')->everyThirtyMinutes();
    }

    protected $commands = [
        \App\Console\Commands\ClearLogs::class,
    ];





}