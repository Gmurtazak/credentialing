<?php

namespace App\Services\PortalTargets;

use Illuminate\Support\Facades\Facade;

class PortalTargetsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'portaltargets';
    }
}
