<?php

namespace App\Services\ProjectSale;

use Illuminate\Support\Facades\Facade;

class ProjectSaleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project_sale';
    }
}
