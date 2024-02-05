<?php

namespace App\Repositories\Schedule;

use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ScheduleRepository extends BaseRepository implements IScheduleRepository
{
    public function __construct(Model $schedule)
    {
        parent::__construct($schedule);
    }


    public function getByMonth($request)
    {

        return $this->model->with(['scheduleDays'])->where('is_active',true)->WhereMonth('expiry_from',$request['month'])->WhereMonth('expiry_to',$request['month'])->get();
    }
}
