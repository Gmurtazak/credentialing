<?php

namespace App\Services\WorkAssignmentError;

use Illuminate\Support\ServiceProvider;

class WorkAssignmentErrorServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding WorkAssignment Error Service
        $this->app->bind('work_assignment_error', WorkAssignmentErrorService::class);
    }
}
