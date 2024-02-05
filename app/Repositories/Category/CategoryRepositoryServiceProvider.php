<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class CategoryRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ICategoryRepository::class, function () {
            return new CategoryRepository(new Category);
        });
    }
}
