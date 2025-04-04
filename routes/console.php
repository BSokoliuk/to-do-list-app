<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('tasks:send-reminders')
    ->dailyAt('09:00')
    ->everyMinute()
    ->withoutOverlapping(1)
    // ->runInBackground()
    ->appendOutputTo(storage_path('logs/schedule.log'));