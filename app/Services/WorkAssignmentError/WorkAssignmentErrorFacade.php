<?php

namespace App\Services\WorkAssignmentError;

use Illuminate\Support\Facades\Facade;

class WorkAssignmentErrorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'work_assignment_error';
    }
}
