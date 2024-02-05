<?php

namespace App\Services\WorkAssignment;

use Illuminate\Support\ServiceProvider;

class WorkAssignmentServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding WorkAssignment Service
        $this->app->bind('work_assignment', WorkAssignmentService::class);
    }
}
