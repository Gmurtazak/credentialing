<?php

namespace App\Repositories\WorkAssignmentAssignedQc;

use App\Models\WorkAssignmentAssignedQc;
use Illuminate\Support\ServiceProvider;

class WorkAssignmentAssignedQcRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IWorkAssignmentAssignedQcRepository::class, function () {
            return new WorkAssignmentAssignedQcRepository(new WorkAssignmentAssignedQc);
        });
    }
}
