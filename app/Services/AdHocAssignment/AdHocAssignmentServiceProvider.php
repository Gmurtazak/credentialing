<?php

namespace App\Services\AdHocAssignment;

use Illuminate\Support\ServiceProvider;

class AdHocAssignmentServiceProvider extends ServiceProvider
{
    public function register()
    {
        //Binding AdHocAssignment Service
        $this->app->bind('ad_hoc_assignment', AdHocAssignmentService::class);
    }
}
