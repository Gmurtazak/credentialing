<?php

namespace App\Repositories\BusinessType;

use App\Models\BusinessType;
use Illuminate\Support\ServiceProvider;

class BusinessTypeRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IBusinessTypeRepository::class, function () {
            return new BusinessTypeRepository(new BusinessType);
        });
    }
}
