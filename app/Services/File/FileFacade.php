<?php

namespace App\Services\File;

use Illuminate\Support\Facades\Facade;

class FileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'file';
    }
}
