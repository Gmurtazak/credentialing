<?php

namespace App\Repositories\Insurance;

use App\Models\Insurance;
use Illuminate\Support\ServiceProvider;

class InsuranceRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IInsuranceRepository::class, function () {
            return new InsuranceRepository(new Insurance);
        });
    }
}
