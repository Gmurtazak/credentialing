<?php

namespace App\Services\Client;

use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Register Client services.
     *
     * @return void
     */
    public function register()
    {
        //Binding Client Service
        $this->app->bind('client', ClientService::class);
    }
}
