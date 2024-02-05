<?php

namespace App\Repositories\Account;

use App\Models\Account;
use Illuminate\Support\ServiceProvider;

class AccountRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IAccountRepository::class, function () {
            return new AccountRepository(new Account);
        });
    }
}
