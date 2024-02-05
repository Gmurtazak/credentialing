<?php

namespace App\Repositories\WorkAssignmentAssignedQc;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class WorkAssignmentAssignedQcRepository extends BaseRepository implements IWorkAssignmentAssignedQcRepository
{
    public function __construct(Model $workAssignmentAssignedQc)
    {
        parent::__construct($workAssignmentAssignedQc);
    }

}
