<?php

namespace App\Services\WorkAssignment;

use App\Dto\WorkAssignmentData;
use App\Repositories\WorkAssignment\IWorkAssignmentRepository;
use App\Repositories\WorkAssignment\WorkAssignmentRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class WorkAssignmentService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IWorkAssignmentRepository $workAssignmentRepository)
    {
        $this->repository = $workAssignmentRepository;
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

    public function create(WorkAssignmentData $workAssignmentData): ?Model
    {
        $workAssignmentData->setCreatedAt(now());
        return $this->repository->create($workAssignmentData->except('id')->toArray());
    }

    public function update(WorkAssignmentData $workAssignmentData): ?Model
    {
        $workAssignmentData->setUpdatedAt(now());
        $workAssignmentData->setIsActive(true);
        return $this->repository->update($workAssignmentData->getId(), $workAssignmentData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData,$type): mixed
    {
        $perPage = $listViewData->perPage;
        if(userRole($listViewData->userId)!='administrator'){
            if ($listViewData->query) {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->where('assigned_to',$listViewData->userId)->where('is_active',$type)->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->where('assigned_to',$listViewData->userId)->where('is_active',$type)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        } else{
            if ($listViewData->query) {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->where('is_active',$type)->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance')->where('is_active',$type)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
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
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance','workAssignmentAssignedQc','workAssignmentAssignedQc.assignedTo')->findInListWhereIn('assigned_to',$assignedTo)->where('is_active',$type)->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance','workAssignmentAssignedQc','workAssignmentAssignedQc.assignedTo')->findInListWhereIn('assigned_to',$assignedTo)->where('is_active',$type)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        } else{
            if ($listViewData->query) {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance','workAssignmentAssignedQc','workAssignmentAssignedQc.assignedTo')->where('is_active',$type)->in(['assigned_date'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('assignedTo','file','category','client','project','projectType','account','insurance','workAssignmentAssignedQc','workAssignmentAssignedQc.assignedTo')->where('is_active',$type)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        }
    }

    public function productivityDatatable(ListViewData $listViewData){
        if ($listViewData->query) {
            return $this->repository->with('assignedTo','logs')->in(['assigned_date'])->search($listViewData->query)->withPagination($listViewData->perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->with('assignedTo','logs')->withPagination($listViewData->perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

    public function datatableUserSubmitted(ListViewData $listViewData,$request): mixed
    {
        return $this->repository->datatableUserSubmitted($listViewData,$request);
    }

    public function clientWise(ListViewData $listViewData,$request): mixed
    {
        return $this->repository->clientWise($listViewData,$request);
    }

}
