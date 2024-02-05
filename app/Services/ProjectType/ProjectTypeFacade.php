<?php

namespace App\Services\ProjectType;

use Illuminate\Support\Facades\Facade;

class ProjectTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project_type';
    }
}
