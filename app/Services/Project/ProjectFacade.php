<?php

namespace App\Services\Project;

use Illuminate\Support\Facades\Facade;

class ProjectFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project';
    }
}
