<?php

namespace App\Services\Portal;

use App\Services\Portal\PortalService;
use Illuminate\Support\ServiceProvider;

class PortalServiceProvider extends ServiceProvider
{
    /**
     * Register PortalService.
     *
     * @return void
     */
    public function register()
    {
        //Binding PortalService
        $this->app->bind('portal', PortalService::class);
    }
}
