<?php

namespace App\Services\Category;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register User services.
     *
     * @return void
     */
    public function register()
    {
        //Binding Category Service
        $this->app->bind('category', CategoryService::class);
    }
}
