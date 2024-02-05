<?php

namespace App\Services\WorkAssignmentTemp;

use Illuminate\Support\ServiceProvider;

class WorkAssignmentTempServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding WorkAssignmentTemp Service
        $this->app->bind('work_assignment_temp', WorkAssignmentTempService::class);
    }
}
