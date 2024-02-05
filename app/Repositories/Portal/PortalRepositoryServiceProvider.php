<?php

namespace App\Repositories\Portal;

use App\Models\Portal;
use Illuminate\Support\ServiceProvider;

class PortalRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IPortalRepository::class, function () {
            return new PortalRepository(new Portal);
        });
    }
}
