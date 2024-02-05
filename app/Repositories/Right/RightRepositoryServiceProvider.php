<?php

namespace App\Repositories\Right;

use App\Models\Right;
use Illuminate\Support\ServiceProvider;

class RightRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IRightRepository::class, function () {
            return new RightRepository(new Right());
        });
    }
}
