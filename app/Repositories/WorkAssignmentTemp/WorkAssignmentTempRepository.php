<?php

namespace App\Repositories\WorkAssignmentTemp;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class WorkAssignmentTempRepository extends BaseRepository implements IWorkAssignmentTempRepository
{
    public function __construct(Model $workAssignmentTemp)
    {
        parent::__construct($workAssignmentTemp);
    }

}
