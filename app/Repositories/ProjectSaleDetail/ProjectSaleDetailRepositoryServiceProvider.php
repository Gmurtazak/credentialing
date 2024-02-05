<?php

namespace App\Repositories\ProjectSaleDetail;

use App\Models\ProjectSaleDetail;
use Illuminate\Support\ServiceProvider;

class ProjectSaleDetailRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IProjectSaleDetailRepository::class, function () {
            return new ProjectSaleDetailRepository(new ProjectSaleDetail);
        });
    }
}
