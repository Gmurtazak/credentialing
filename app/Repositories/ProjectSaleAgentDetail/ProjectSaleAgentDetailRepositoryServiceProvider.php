<?php

namespace App\Repositories\ProjectSaleAgentDetail;

use App\Models\ProjectSaleAgentDetail;
use Illuminate\Support\ServiceProvider;

class ProjectSaleAgentDetailRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IProjectSaleAgentDetailRepository::class, function () {
            return new ProjectSaleAgentDetailRepository(new ProjectSaleAgentDetail());
        });
    }
}
