<?php

namespace App\Services\PortalTargets;

use Illuminate\Support\ServiceProvider;

class PortalTargetsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding User Service
        $this->app->bind('team', PortalTargetsService::class);
    }
}
