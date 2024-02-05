<?php

namespace App\Repositories\WorkAssignmentLog;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class WorkAssignmentLogRepository extends BaseRepository implements IWorkAssignmentLogRepository
{
    public function __construct(Model $workAssignmentLog)
    {
        parent::__construct($workAssignmentLog);
    }

}
