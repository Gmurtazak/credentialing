<?php

namespace App\Services\Schedule;

use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register Schedule services.
     *
     * @return void
     */
    public function register()
    {
        //Binding Schedule Service
        $this->app->bind('schedule', ScheduleService::class);
    }
}
