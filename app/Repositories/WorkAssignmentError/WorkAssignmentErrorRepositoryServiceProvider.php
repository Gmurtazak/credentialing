<?php

namespace App\Repositories\WorkAssignmentError;

use App\Models\WorkAssignmentError;
use Illuminate\Support\ServiceProvider;

class WorkAssignmentErrorRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IWorkAssignmentErrorRepository::class, function () {
            return new WorkAssignmentErrorRepository(new WorkAssignmentError);
        });
    }
}
