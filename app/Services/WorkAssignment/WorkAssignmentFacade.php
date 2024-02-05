<?php

namespace App\Services\WorkAssignment;

use Illuminate\Support\Facades\Facade;

class WorkAssignmentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'work_assignment';
    }
}
