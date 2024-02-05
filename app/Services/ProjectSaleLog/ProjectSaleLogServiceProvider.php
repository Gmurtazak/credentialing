<?php

namespace App\Services\ProjectSaleLog;

use App\Services\ProjectSaleLog\ProjectSaleLogService;
use Illuminate\Support\ServiceProvider;

class ProjectSaleLogServiceProvider extends ServiceProvider
{
    /**
     * Register ProjectSaleDetailService.
     *
     * @return void
     */
    public function register()
    {
        //Binding ProjectSaleService
        $this->app->bind('project_sale_log', ProjectSaleLogService::class);
    }
}
