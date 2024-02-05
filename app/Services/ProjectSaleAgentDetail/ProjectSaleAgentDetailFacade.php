<?php

namespace App\Services\ProjectSaleAgentDetail;

use Illuminate\Support\Facades\Facade;

class ProjectSaleAgentDetailFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'project_sale_agent_detail';
    }
}
