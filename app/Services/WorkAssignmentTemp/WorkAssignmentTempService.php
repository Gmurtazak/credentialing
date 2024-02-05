<?php

namespace App\Services\WorkAssignmentTemp;

use App\Dto\WorkAssignmentTempData;
use App\Repositories\WorkAssignmentTemp\IWorkAssignmentTempRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class WorkAssignmentTempService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IWorkAssignmentTempRepository $workAssignmentTempRepository)
    {
        $this->repository = $workAssignmentTempRepository;
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
        return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->sortBy('id','DESC')->findAllByAttribute('ref_wa_id',NULL);
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
     * @param WorkAssignmentTempData $workAssignmentTempData
     * @return Model|null
     */
    public function create(WorkAssignmentTempData $workAssignmentTempData): ?Model
    {
        $workAssignmentTempData->setCreatedAt(now());
        return $this->repository->create($workAssignmentTempData->except('id')->toArray());
    }

    /**
     * @param WorkAssignmentTempData $workAssignmentTempData
     * @return Model|null
     */
    public function update(WorkAssignmentTempData $workAssignmentTempData): ?Model
    {
        $workAssignmentTempData->setUpdatedAt(now());
        return $this->repository->update($workAssignmentTempData->getId(), $workAssignmentTempData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
