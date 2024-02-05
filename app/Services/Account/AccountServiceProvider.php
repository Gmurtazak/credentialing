<?php

namespace App\Services\Account;

use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register account services.
     *
     * @return void
     */
    public function register()
    {
        //Binding account Service
        $this->app->bind('account', AccountService::class);
    }
}
