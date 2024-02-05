<?php

namespace App\Services\UserAttendance;

use App\Repositories\UserAttendance\IUserAttendanceRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class UserAttendanceService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IUserAttendanceRepository $userAttendanceRepository)
    {
        $this->repository = $userAttendanceRepository;
    }

    /**
     * @param int $user_id
     * @return Model|null
     */
    public function getById(int $user_id): ?Model
    {
        return $this->repository->getByIdWithoutFail($user_id);
    }

    /**
     * @param int $user_id
     * @return Model|null
     */
    public function find(int $user_id): ?Model
    {
        return $this->repository->find($user_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->with('teamLead')->sortBy('id','desc')->all();
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

    public function create(TeamData $teamData): ?Model
    {
        $teamData->setCreatedAt(now());
        return $this->repository->create($teamData->except('id')->toArray());
    }

    public function update(TeamData $teamData): ?Model
    {
        $teamData->setUpdatedAt(now());
        return $this->repository->update($teamData->getId(), $teamData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
    }

    public function datatableByEmpCode($request)
    {
        return $this->repository->datatableByEmpCode($request);
    }

}
