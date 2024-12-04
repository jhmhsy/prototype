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
        $schedule->command('locker:update-status')->everyTwoSeconds();

        $schedule->command('service:update-status')->everyTwoSeconds();

        $schedule->command('treadmill:update-status')->everyTwoSeconds();

        $schedule->command('membership:update-status')->everyTwoSeconds();

        $schedule->command('app:service-due-reminder')->everyTwoSeconds();

        $schedule->command(' app:locker-treadmill-reminder')->everyTwoSeconds();

        $schedule->command(' app:membership-reminder')->everyTwoSeconds();

        $schedule->command('events:update-status')->everyTwoSeconds();
    }

    protected $commands = [
        \App\Console\Commands\ClearLogs::class,
    ];





}