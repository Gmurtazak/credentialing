<?php

namespace App\Services\Insurance;

use Illuminate\Support\Facades\Facade;

class InsuranceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'insurance';
    }
}
