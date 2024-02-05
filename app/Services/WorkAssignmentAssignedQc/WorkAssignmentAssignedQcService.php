<?php

namespace App\Services\WorkAssignmentAssignedQc;

use App\Dto\WorkAssignmentAssignedQcData;
use App\Repositories\WorkAssignmentAssignedQc\IWorkAssignmentAssignedQcRepository;
use App\Repositories\WorkAssignmentAssignedQc\WorkAssignmentAssignedQcRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class WorkAssignmentAssignedQcService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IWorkAssignmentAssignedQcRepository $workAssignmentAssignedQcRepository)
    {
        $this->repository = $workAssignmentAssignedQcRepository;
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
     * @param int $user_id
     * @return Model|null
     */
    public function findWithLogs(int $user_id): ?Model
    {
        return $this->repository->with('logs','file','account')->find($user_id);
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

    public function create(WorkAssignmentAssignedQcData $workAssignmentAssignedQcData): ?Model
    {
        $workAssignmentAssignedQcData->setCreatedAt(now());
        return $this->repository->create($workAssignmentAssignedQcData->except('id')->toArray());
    }

    public function update(WorkAssignmentAssignedQcData $workAssignmentAssignedQcData): ?Model
    {
        $workAssignmentAssignedQcData->setUpdatedAt(now());
        $workAssignmentAssignedQcData->setIsActive(true);
        return $this->repository->update($workAssignmentAssignedQcData->getId(), $workAssignmentAssignedQcData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if(userRole($listViewData->userId)!='administrator'){
            if ($listViewData->query) {
                return $this->repository->with('workAssignment','workAssignment.file','workAssignment.category','workAssignment.client','workAssignment.project','workAssignment.projectType','workAssignment.account','workAssignment.insurance')->where('qc_assign_to',$listViewData->userId)->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('workAssignment','workAssignment.file','workAssignment.category','workAssignment.client','workAssignment.project','workAssignment.projectType','workAssignment.account','workAssignment.insurance')->where('qc_assign_to',$listViewData->userId)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        } else{
            if ($listViewData->query) {
                return $this->repository->with('workAssignment','workAssignment.file','workAssignment.category','workAssignment.client','workAssignment.project','workAssignment.projectType','workAssignment.account','workAssignment.insurance')->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('workAssignment','workAssignment.file','workAssignment.category','workAssignment.client','workAssignment.project','workAssignment.projectType','workAssignment.account','workAssignment.insurance')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        }
    }


    /**
     * @param ListViewData $listViewData
     * @param $type
     * @return mixed
     */
    public function datatableSubmitted(ListViewData $listViewData,$type): mixed
    {
        $perPage = $listViewData->perPage;
        $assignedTo = getReportsTo($listViewData->userId);
        $assignedTo[] = $listViewData->userId;
        if(userRole($listViewData->userId)!='administrator'){
            if ($listViewData->query) {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->findInListWhereIn('assigned_to',$assignedTo)->where('is_active',$type)->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->findInListWhereIn('assigned_to',$assignedTo)->where('is_active',$type)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        } else{
            if ($listViewData->query) {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->where('is_active',$type)->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->where('is_active',$type)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        }
    }

}
