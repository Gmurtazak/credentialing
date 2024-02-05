<?php

namespace App\Services\ProjectSaleAgentDetail;

use App\Services\ProjectSaleAgentDetail\ProjectSaleAgentDetailService;
use Illuminate\Support\ServiceProvider;

class ProjectSaleAgentDetailServiceProvider extends ServiceProvider
{
    /**
     * Register ProjectSaleAgentDetailService.
     *
     * @return void
     */
    public function register()
    {
        //Binding ProjectSaleAgentDetailService
        $this->app->bind('project_sale_agent_detail', ProjectSaleAgentDetailService::class);
    }
}
