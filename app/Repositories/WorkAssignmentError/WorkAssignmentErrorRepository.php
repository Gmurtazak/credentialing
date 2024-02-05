<?php

namespace App\Repositories\WorkAssignmentError;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class WorkAssignmentErrorRepository extends BaseRepository implements IWorkAssignmentErrorRepository
{
    public function __construct(Model $workAssignmentError)
    {
        parent::__construct($workAssignmentError);
    }



}
