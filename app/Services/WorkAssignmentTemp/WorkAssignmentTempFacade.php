<?php

namespace App\Services\WorkAssignmentTemp;

use Illuminate\Support\Facades\Facade;

class WorkAssignmentTempFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'work_assignment_temp';
    }
}
