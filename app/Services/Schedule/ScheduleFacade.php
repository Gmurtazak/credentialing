<?php

namespace App\Services\Schedule;

use Illuminate\Support\Facades\Facade;

class ScheduleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'schedule';
    }
}
