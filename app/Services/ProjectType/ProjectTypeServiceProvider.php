<?php

namespace App\Services\ProjectType;

use App\Services\Category\ProjectTypeService;
use Illuminate\Support\ServiceProvider;

class ProjectTypeServiceProvider extends ServiceProvider
{
    /**
     * Register project_type services.
     *
     * @return void
     */
    public function register()
    {
        //Binding project_type Service
        $this->app->bind('project_type', ProjectTypeService::class);
    }
}
