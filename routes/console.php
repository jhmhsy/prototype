<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('locker:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'))
    ->emailOutputOnFailure('your-email@example.com');

Schedule::command('service:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'))
    ->emailOutputOnFailure('your-email@example.com');

Schedule::command('treadmill:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'))
    ->emailOutputOnFailure('your-email@example.com');

Schedule::command('membership:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'))
    ->emailOutputOnFailure('your-email@example.com');


Schedule::command('app:service-due-reminder')
    ->everyTwoSeconds()
    ->appendOutputTo(storage_path('logs/scheduler.log'))
    ->emailOutputOnFailure('your-email@example.com');


Schedule::command('app:locker-treadmill-reminder')
    ->everyTwoSeconds()
    ->appendOutputTo(storage_path('logs/scheduler.log'))
    ->emailOutputOnFailure('your-email@example.com');


Schedule::command('app:membership-reminder')
    ->everyTwoSeconds()
    ->appendOutputTo(storage_path('logs/scheduler.log'))
    ->emailOutputOnFailure('your-email@example.com');