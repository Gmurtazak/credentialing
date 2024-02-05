<?php

namespace App\Services\Entity;

use App\Services\Entity\EntityService;
use Illuminate\Support\ServiceProvider;

class EntityServiceProvider extends ServiceProvider
{
    /**
     * Register User services.
     *
     * @return void
     */
    public function register()
    {
        //Binding User Service
        $this->app->bind('entity', EntityService::class);
    }
}
