<?php

namespace App\Repositories\Project;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectRepository extends BaseRepository implements IProjectRepository
{
    public function __construct(Model $project)
    {
        parent::__construct($project);
    }
}
