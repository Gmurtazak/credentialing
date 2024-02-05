<?php

namespace App\Services\WorkAssignmentLog;

use App\Dto\WorkAssignmentLogData;
use App\Repositories\WorkAssignmentLog\IWorkAssignmentLogRepository;
use App\Repositories\WorkAssignmentLog\WorkAssignmentLogRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class WorkAssignmentLogService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IWorkAssignmentLogRepository $workAssignmentLogRepository)
    {
        $this->repository = $workAssignmentLogRepository;
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

    /**
     * @param $attr
     * @param $value
     * @return Collection|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAllByAttribute($attr,$value): Collection|\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->repository->sortBy('id','DESC')->findAllByAttribute($attr, $value);
    }

    public function create(WorkAssignmentLogData $workAssignmentLogData): ?Model
    {
        $workAssignmentLogData->setCreatedAt(now());
        return $this->repository->create($workAssignmentLogData->except('id')->toArray());
    }

    public function update(WorkAssignmentLogData $workAssignmentLogData): ?Model
    {
        $workAssignmentLogData->setUpdatedAt(now());
        return $this->repository->update($workAssignmentLogData->getId(), $workAssignmentLogData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->with('workAssignment')->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->with('workAssignment')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
