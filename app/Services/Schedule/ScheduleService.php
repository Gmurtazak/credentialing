<?php

namespace App\Services\Schedule;

use App\Dto\ScheduleData;
use App\Models\Schedule;
use App\Repositories\Schedule\IScheduleRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class ScheduleService
{
    /**
     * @var
     */
    protected IScheduleRepository $repository;

    /**
     * @param IScheduleRepository $scheduleRepository
     */
    public function __construct(IScheduleRepository $scheduleRepository)
    {
        $this->repository = $scheduleRepository;
    }

    /**
     * @param int $category_id
     * @return Model|null
     */
    public function getById(int $category_id): ?Model
    {
        return $this->repository->getByIdWithoutFail($category_id);
    }

    /**
     * @param int $category_id
     * @return Model|null
     */
    public function find(int $category_id): ?Model
    {
        return $this->repository->find($category_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->sortBy('id','desc')->all();
    }

    /**
     * @param $attr
     * @param $value
     * @return Model|null
     */
    public function findByAttribute($attr,$value): ?Model
    {
        return $this->repository->findByAttribute($attr, $value);
    }

    /**
     * @param ScheduleData $scheduleData
     * @return Model|null
     */
    public function create(ScheduleData $scheduleData): ?Model
    {
        $schedule = \DB::table('schedules')->where('expiry_from',$scheduleData->getExpiryFrom())->where('expiry_to',$scheduleData->getExpiryTo())->first();
        if($schedule){
            \DB::table('schedule_days')->where('schedule_id',$schedule->id)->delete();
            \DB::table('schedules')->where('id',$schedule->id)->delete();
        }
        $scheduleData->setCreatedAt(now());
        $schedule = $this->repository->create($scheduleData->except('id','working_days')->toArray());
        if($scheduleData->working_days){
            $workingDays = explode(',',$scheduleData->working_days);
            $workingDaysData = [];
            foreach($workingDays as $ind=>$day){
                $data['schedule_id'] = $schedule->id;
                $data['working_day'] = $day;
                array_push($workingDaysData,$data);
            }
            \DB::table('schedule_days')->insert($workingDaysData);
        }
        return $schedule;
    }

    /**
     * @param ScheduleData $scheduleData
     * @return Model|null
     */
    public function update(ScheduleData $scheduleData): ?Model
    {
        $scheduleData->setUpdatedAt(now());
        return $this->repository->update($scheduleData->getId(), $scheduleData->except('id', 'created_at','working_days')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->with('scheduleDays')->in(['name'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->with('scheduleDays')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

    public function getByMonth($request){
        return $this->repository->getByMonth($request);
    }


}
