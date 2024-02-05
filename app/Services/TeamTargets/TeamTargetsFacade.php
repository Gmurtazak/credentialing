<?php

namespace App\Services\TeamTargets;

use Illuminate\Support\Facades\Facade;

class TeamTargetsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'teamtargets';
    }
}
