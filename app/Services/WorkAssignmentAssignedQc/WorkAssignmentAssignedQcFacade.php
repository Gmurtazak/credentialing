<?php

namespace App\Services\WorkAssignmentAssignedQc;

use Illuminate\Support\Facades\Facade;

class WorkAssignmentAssignedQcFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'work_assignment_assigned_qc';
    }
}
