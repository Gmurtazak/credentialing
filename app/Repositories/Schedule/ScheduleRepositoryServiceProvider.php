<?php

namespace App\Repositories\Schedule;

use App\Models\Schedule;
use Illuminate\Support\ServiceProvider;

class ScheduleRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IScheduleRepository::class, function () {
            return new ScheduleRepository(new Schedule);
        });
    }
}
