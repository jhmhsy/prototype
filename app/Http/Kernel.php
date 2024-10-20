<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

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
        'admin' => \App\Http\Middleware\isAdmin::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('locker:update-status')->daily();
    }

}