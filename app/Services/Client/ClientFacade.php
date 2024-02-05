<?php

namespace App\Services\Client;

use Illuminate\Support\Facades\Facade;

class ClientFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'clients';
    }
}
