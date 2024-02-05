<?php

namespace App\Services\Entity;

use Illuminate\Support\Facades\Facade;

class EntityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'entity';
    }
}
