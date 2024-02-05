<?php

namespace App\Services\ProjectSale;

use App\Services\ProjectSale\ProjectSaleService;
use Illuminate\Support\ServiceProvider;

class ProjectSaleServiceProvider extends ServiceProvider
{
    /**
     * Register ProjectSaleService.
     *
     * @return void
     */
    public function register()
    {
        //Binding ProjectSaleService
        $this->app->bind('project_sale', ProjectSaleService::class);
    }
}
