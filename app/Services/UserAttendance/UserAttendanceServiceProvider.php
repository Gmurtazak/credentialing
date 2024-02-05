<?php

namespace App\Services\UserAttendance;

use Illuminate\Support\ServiceProvider;

class UserAttendanceServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding User Attendance Service
        $this->app->bind('user_attendance', UserAttendanceService::class);
    }
}
