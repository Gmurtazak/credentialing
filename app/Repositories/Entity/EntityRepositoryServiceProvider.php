<?php

namespace App\Repositories\Entity;

use App\Models\Entity;
use Illuminate\Support\ServiceProvider;

class EntityRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IEntityRepository::class, function () {
            return new EntityRepository(new Entity);
        });
    }
}
