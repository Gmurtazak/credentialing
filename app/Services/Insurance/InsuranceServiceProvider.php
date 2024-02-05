<?php

namespace App\Services\Insurance;

use Illuminate\Support\ServiceProvider;

class InsuranceServiceProvider extends ServiceProvider
{
    /**
     * Register Insurance services.
     *
     * @return void
     */
    public function register()
    {
        //Binding Insurance Service
        $this->app->bind('insurance', InsuranceService::class);
    }
}
