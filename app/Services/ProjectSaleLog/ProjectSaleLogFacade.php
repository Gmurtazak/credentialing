<?php

namespace App\Services\ProjectSaleLog;

use Illuminate\Support\Facades\Facade;

class ProjectSaleLogFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project_sale_log';
    }
}
