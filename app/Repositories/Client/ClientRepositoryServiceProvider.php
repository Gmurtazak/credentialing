<?php

namespace App\Repositories\Client;

use App\Models\Client;
use Illuminate\Support\ServiceProvider;

class ClientRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IClientRepository::class, function () {
            return new ClientRepository(new Client);
        });
    }
}
