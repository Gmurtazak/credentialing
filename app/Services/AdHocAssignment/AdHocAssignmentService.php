<?php

namespace App\Services\AdHocAssignment;

use App\Dto\AdHocAssignmentData;
use App\Repositories\AdHocAssignment\IAdHocAssignmentRepository;
use App\Repositories\AdHocAssignment\AdHocAssignmentRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class AdHocAssignmentService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IAdHocAssignmentRepository $adHocAssignmentRepository)
    {
        $this->repository = $adHocAssignmentRepository;
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

    public function create(AdHocAssignmentData $adHocAssignmentData): ?Model
    {
        $adHocAssignmentData->setCreatedAt(now());
        return $this->repository->create($adHocAssignmentData->except('id')->toArray());
    }

    public function update(AdHocAssignmentData $adHocAssignmentData): ?Model
    {
        $adHocAssignmentData->setUpdatedAt(now());
        return $this->repository->update($adHocAssignmentData->getId(), $adHocAssignmentData->except('id', 'created_at')->toArray());
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
                return $this->repository->with('client','project','createdBy','approvedBy')->where('created_by',$listViewData->userId)->in(['ad_hoc_work_type'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('client','project','createdBy','approvedBy')->where('created_by',$listViewData->userId)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        } else{
            if ($listViewData->query) {
                return $this->repository->with('client','project','createdBy','approvedBy')->in(['ad_hoc_work_type'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            } else {
                return $this->repository->with('client','project','createdBy','approvedBy')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
            }
        }
    }

    public function datatableUserSubmitted(ListViewData $listViewData,$request): mixed
    {
        return $this->repository->datatableUserSubmitted($listViewData,$request);
    }

}
