<?php

namespace App\Repositories\AdHocAssignment;

use App\Models\AdHocAssignment;
use App\Repositories\AdHocAssignment\IAdHocAssignmentRepository;
use Illuminate\Support\ServiceProvider;

class AdHocAssignmentRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IAdHocAssignmentRepository::class, function () {
            return new AdHocAssignmentRepository(new AdHocAssignment());
        });
    }
}
