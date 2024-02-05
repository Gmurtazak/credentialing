<?php

namespace App\Repositories\ProjectSale;

use App\Models\ProjectSale;
use Illuminate\Support\ServiceProvider;

class ProjectSaleRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IProjectSaleRepository::class, function () {
            return new ProjectSaleRepository(new ProjectSale());
        });
    }
}
