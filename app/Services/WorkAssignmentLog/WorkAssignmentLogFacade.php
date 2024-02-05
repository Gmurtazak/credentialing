<?php

namespace App\Services\WorkAssignmentLog;

use Illuminate\Support\Facades\Facade;

class WorkAssignmentLogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'work_assignment_log';
    }
}
