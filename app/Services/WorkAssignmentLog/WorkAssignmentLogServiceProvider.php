<?php

namespace App\Services\WorkAssignmentLog;

use Illuminate\Support\ServiceProvider;

class WorkAssignmentLogServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding WorkAssignmentLog Service
        $this->app->bind('work_assignment_log', WorkAssignmentService::class);
    }
}
