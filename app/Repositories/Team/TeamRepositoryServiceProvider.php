<?php

namespace App\Repositories\Team;

use App\Models\Team;
use Illuminate\Support\ServiceProvider;

class TeamRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ITeamRepository::class, function () {
            return new TeamRepository(new Team);
        });
    }
}
