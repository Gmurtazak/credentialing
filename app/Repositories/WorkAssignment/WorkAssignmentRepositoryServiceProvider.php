<?php

namespace App\Repositories\WorkAssignment;

use App\Models\WorkAssignment;
use Illuminate\Support\ServiceProvider;

class WorkAssignmentRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IWorkAssignmentRepository::class, function () {
            return new WorkAssignmentRepository(new WorkAssignment);
        });
    }
}
