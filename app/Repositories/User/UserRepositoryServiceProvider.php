<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class UserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register IUserRepository.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserRepository::class, function () {
            return new UserRepository(new User);
        });
    }
}
