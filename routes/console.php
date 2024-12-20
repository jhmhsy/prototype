<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('locker:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));

Schedule::command('service:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));

Schedule::command('treadmill:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));

Schedule::command('membership:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));


Schedule::command('app:service-due-reminder')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));


Schedule::command('app:locker-treadmill-reminder')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));


Schedule::command('app:membership-reminder')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));

Schedule::command('events:update-status')
    ->everyMinute()
    ->appendOutputTo(storage_path('logs/scheduler.log'));