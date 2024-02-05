<?php

namespace App\Repositories\WorkAssignmentLog;

use App\Models\WorkAssignmentLog;
use Illuminate\Support\ServiceProvider;

class WorkAssignmentLogRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IWorkAssignmentLogRepository::class, function () {
            return new WorkAssignmentLogRepository(new WorkAssignmentLog);
        });
    }
}
