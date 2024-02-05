<?php

namespace App\Repositories\AdHocAssignment;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class AdHocAssignmentRepository extends BaseRepository implements IAdHocAssignmentRepository
{
    public function __construct(Model $adHocAssignment)
    {
        parent::__construct($adHocAssignment);
    }

    public function datatableUserSubmitted($listViewData,$request)
    {
        return $this->model->where('created_by',$request['userId'])->where('status',true)->WhereMonth('date',$request['month'])->WhereYear('date',$request['year'])->orderBy($listViewData->sortByColumn, $listViewData->sortByDirection)->get();
    }

}
