<?php

namespace App\Services\BusinessType;

use Illuminate\Support\ServiceProvider;

class BusinessTypeServiceProvider extends ServiceProvider
{
    /**
     * Register BusinessType services.
     *
     * @return void
     */
    public function register()
    {
        //Binding BusinessType Service
        $this->app->bind('business_type', BusinessTypeService::class);
    }
}
