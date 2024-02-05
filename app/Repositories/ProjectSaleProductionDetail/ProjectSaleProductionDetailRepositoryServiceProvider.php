<?php

namespace App\Repositories\ProjectSaleProductionDetail;

use App\Models\ProjectSaleProductionDetail;
use Illuminate\Support\ServiceProvider;

class ProjectSaleProductionDetailRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IProjectSaleProductionDetailRepository::class, function () {
            return new ProjectSaleProductionDetailRepository(new ProjectSaleProductionDetail);
        });
    }
}
