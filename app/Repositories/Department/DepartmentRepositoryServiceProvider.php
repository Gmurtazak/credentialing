<?php

namespace App\Repositories\Department;

use App\Models\Department;
use Illuminate\Support\ServiceProvider;

class DepartmentRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IDepartmentRepository::class, function () {
            return new DepartmentRepository(new Department());
        });
    }
}
