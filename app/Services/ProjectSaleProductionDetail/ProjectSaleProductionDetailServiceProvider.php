<?php

namespace App\Services\ProjectSaleProductionDetail;

use App\Services\ProjectSaleProductionDetail\ProjectSaleProductionDetailService;
use Illuminate\Support\ServiceProvider;

class ProjectSaleProductionDetailServiceProvider extends ServiceProvider
{
    /**
     * Register project_sale_production_detail.
     *
     * @return void
     */
    public function register()
    {
        //Binding project_sale_production_detail
        $this->app->bind('project_sale_production_detail', ProjectSaleProductionDetailService::class);
    }
}
