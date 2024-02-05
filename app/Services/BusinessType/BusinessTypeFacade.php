<?php

namespace App\Services\BusinessType;

use Illuminate\Support\Facades\Facade;

class BusinessTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'business_type';
    }
}
