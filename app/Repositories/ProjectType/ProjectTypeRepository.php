<?php

namespace App\Repositories\ProjectType;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectTypeRepository extends BaseRepository implements IProjectTypeRepository
{
    public function __construct(Model $category)
    {
        parent::__construct($category);
    }
}
