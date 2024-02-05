<?php

namespace App\Repositories\Role;

use App\Models\Role;
use Illuminate\Support\ServiceProvider;

class RoleRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IRoleRepository::class, function () {
            return new RoleRepository(new Role);
        });
    }
}
