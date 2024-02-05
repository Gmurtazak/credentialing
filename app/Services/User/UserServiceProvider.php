<?php

namespace App\Services\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register User services.
     *
     * @return void
     */
    public function register()
    {
        //Binding User Service
        $this->app->bind('user', UserService::class);
    }
}
