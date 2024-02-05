<?php

namespace App\Services\Project;

use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register project services.
     *
     * @return void
     */
    public function register()
    {
        //Binding project Service
        $this->app->bind('project', ProjectService::class);
    }
}
