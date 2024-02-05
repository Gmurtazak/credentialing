<?php

namespace App\Services\Team;

use Illuminate\Support\ServiceProvider;

class TeamServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding User Service
        $this->app->bind('team', TeamService::class);
    }
}
