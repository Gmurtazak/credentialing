<?php

namespace App\Repositories\Project;

use App\Models\Project;
use Illuminate\Support\ServiceProvider;

class ProjectRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IProjectRepository::class, function () {
            return new ProjectRepository(new Project);
        });
    }
}
