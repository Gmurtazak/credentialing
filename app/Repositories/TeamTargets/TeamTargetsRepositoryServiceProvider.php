<?php

namespace App\Repositories\TeamTargets;

use App\Models\TeamTargets;
use Illuminate\Support\ServiceProvider;

class TeamTargetsRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ITeamTargetsRepository::class, function () {
            return new TeamTargetsRepository(new TeamTargets);
        });
    }
}
