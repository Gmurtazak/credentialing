<?php

namespace App\Services\Role;

use App\Services\Role\RoleService;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register User services.
     *
     * @return void
     */
    public function register()
    {
        //Binding User Service
        $this->app->bind('role', RoleService::class);
    }
}
