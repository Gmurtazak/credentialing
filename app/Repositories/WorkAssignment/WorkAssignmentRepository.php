<?php

namespace App\Repositories\WorkAssignment;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class WorkAssignmentRepository extends BaseRepository implements IWorkAssignmentRepository
{
    public function __construct(Model $workAssignment)
    {
        parent::__construct($workAssignment);
    }

    public function datatableUserSubmitted($listViewData,$request)
    {
        return $this->model->with('assignedTo','logs')->where('assigned_to',$request['userId'])->where('is_active',true)->WhereMonth('assigned_date',$request['month'])->WhereYear('assigned_date',$request['year'])->orderBy($listViewData->sortByColumn, $listViewData->sortByDirection)->get();
    }

    public function clientWise($listViewData,$request)
    {
        return $this->model->with('client','account','logs','workAssignmentAssignedQc','workAssignmentErrors')->where('is_active',true)->WhereMonth('assigned_date',$request['month'])->WhereYear('assigned_date',$request['year'])->orderBy($listViewData->sortByColumn, $listViewData->sortByDirection)->get();
    }

}
