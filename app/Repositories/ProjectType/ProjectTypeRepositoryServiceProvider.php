<?php

namespace App\Repositories\ProjectType;

use App\Models\ProjectType;
use Illuminate\Support\ServiceProvider;

class ProjectTypeRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IProjectTypeRepository::class, function () {
            return new ProjectTypeRepository(new ProjectType);
        });
    }
}
