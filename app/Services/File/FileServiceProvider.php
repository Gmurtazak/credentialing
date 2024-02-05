<?php

namespace App\Services\File;

use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    /**
     * Register File services.
     *
     * @return void
     */
    public function register()
    {
        //Binding File Service
        $this->app->bind('file', FileService::class);
    }
}
