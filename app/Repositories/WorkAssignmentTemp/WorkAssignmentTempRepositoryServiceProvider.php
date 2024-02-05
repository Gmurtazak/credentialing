<?php

namespace App\Repositories\WorkAssignmentTemp;

use App\Models\WorkAssignmentsTemp;
use Illuminate\Support\ServiceProvider;

class WorkAssignmentTempRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IWorkAssignmentTempRepository::class, function () {
            return new WorkAssignmentTempRepository(new WorkAssignmentsTemp);
        });
    }
}
