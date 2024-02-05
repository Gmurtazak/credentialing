<?php

namespace App\Repositories\UserAttendance;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class UserAttendanceRepository extends BaseRepository implements IUserAttendanceRepository
{
    public function __construct(Model $userAttendance)
    {
        parent::__construct($userAttendance);
    }

    public function datatableByEmpCode($request)
    {
        return $this->model->where('emp_code',$request['empCode'])->WhereMonth('attendance_date',$request['month'])->WhereYear('attendance_date',$request['year'])->orderBy('attendance_date','ASC')->get();
    }

}
