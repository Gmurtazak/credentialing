<?php

namespace App\Services\ProjectSaleDetail;

use App\Services\ProjectSaleDetail\ProjectSaleDetailService;
use Illuminate\Support\ServiceProvider;

class ProjectSaleDetailServiceProvider extends ServiceProvider
{
    /**
     * Register ProjectSaleDetailService.
     *
     * @return void
     */
    public function register()
    {
        //Binding ProjectSaleService
        $this->app->bind('project_sale_detail', ProjectSaleDetailService::class);
    }
}
