<?php

namespace App\Repositories\UserAttendance;

use App\Models\UserAttendance;
use Illuminate\Support\ServiceProvider;

class UserAttendanceRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IUserAttendanceRepository::class, function () {
            return new UserAttendanceRepository(new UserAttendance);
        });
    }
}
