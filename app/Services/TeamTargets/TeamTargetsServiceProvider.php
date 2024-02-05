<?php

namespace App\Services\TeamTargets;

use Illuminate\Support\ServiceProvider;

class TeamTargetsServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding User Service
        $this->app->bind('team', TeamTargetsService::class);
    }
}
