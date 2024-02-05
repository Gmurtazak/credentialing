<?php

namespace App\Services\AdHocAssignment;

use Illuminate\Support\Facades\Facade;

class AdHocAssignmentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ad_hoc_assignment';
    }
}
