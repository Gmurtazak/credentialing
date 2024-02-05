<?php

namespace App\Services\UserAttendance;

use Illuminate\Support\Facades\Facade;

class UserAttendanceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'user_attendance';
    }
}
