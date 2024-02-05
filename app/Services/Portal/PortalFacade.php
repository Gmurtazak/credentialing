<?php

namespace App\Services\Portal;

use Illuminate\Support\Facades\Facade;

class PortalFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'portal';
    }
}
