<?php

namespace App\Services\ProjectSaleProductionDetail;

use Illuminate\Support\Facades\Facade;

class ProjectSaleProductionDetailFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project_sale_production_detail';
    }
}
