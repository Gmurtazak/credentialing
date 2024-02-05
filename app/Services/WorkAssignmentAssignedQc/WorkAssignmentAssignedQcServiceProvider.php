<?php

namespace App\Services\WorkAssignmentAssignedQc;

use Illuminate\Support\ServiceProvider;

class WorkAssignmentAssignedQcServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding WorkAssignment Assigned QcService
        $this->app->bind('work_assignment_assigned_qc', WorkAssignmentAssignedQcService::class);
    }
}
