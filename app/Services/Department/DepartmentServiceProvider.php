<?php

namespace App\Services\Department;

use Illuminate\Support\ServiceProvider;

class DepartmentServiceProvider extends ServiceProvider
{
    /**
     * Register User services.
     *
     * @return void
     */
    public function register()
    {
        //Binding User Service
        $this->app->bind('department', DepartmentService::class);
    }
}
