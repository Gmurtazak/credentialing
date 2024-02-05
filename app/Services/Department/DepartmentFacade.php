<?php

namespace App\Services\Department;

use Illuminate\Support\Facades\Facade;

class DepartmentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'department';
    }
}
