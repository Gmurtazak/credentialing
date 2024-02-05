<?php

namespace App\Repositories\File;

use App\Models\File;
use Illuminate\Support\ServiceProvider;

class FileRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IFileRepository::class, function () {
            return new FileRepository(new File);
        });
    }
}
