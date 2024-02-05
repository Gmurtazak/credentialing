<?php

namespace App\Repositories\ProjectSaleLog;

use App\Models\projectSaleLog;
use Illuminate\Support\ServiceProvider;

class ProjectSaleLogRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IProjectSaleLogRepository::class, function () {
            return new ProjectSaleLogRepository(new projectSaleLog());
        });
    }
}
