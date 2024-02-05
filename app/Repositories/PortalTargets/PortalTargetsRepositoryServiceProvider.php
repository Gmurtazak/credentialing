<?php

namespace App\Repositories\PortalTargets;

use App\Models\PortalTargets;
use Illuminate\Support\ServiceProvider;

class PortalTargetsRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IPortalTargetsRepository::class, function () {
            return new PortalTargetsRepository(new PortalTargets);
        });
    }
}
