<?php

namespace App\Services\ProjectSaleDetail;

use Illuminate\Support\Facades\Facade;

class ProjectSaleDetailFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project_sale_detail';
    }
}
