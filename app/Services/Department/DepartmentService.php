<?php

namespace App\Services\Department;

use App\Dto\DepartmentData;
use App\Models\Department;
use App\Repositories\Department\IDepartmentRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class DepartmentService
{
    /**
     * @var
     */
    protected $repository;

    /**
     * @param IDepartmentRepository $departmentRepository
     */
    public function __construct(IDepartmentRepository $departmentRepository)
    {
        $this->repository = $departmentRepository;
    }

    public function getById(int $department_id): ?Model
    {
        return $this->repository->getByIdWithoutFail($department_id);
    }

    public function find(int $department_id): ?Model
    {
        return $this->repository->find($department_id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->repository->with('owner')->sortBy('id','desc')->all();
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
     * @param DepartmentData $departmentData
     * @return Model|null
     */
    public function create(DepartmentData $departmentData): ?Model
    {
        $upload_file_path = 'departments/';
        $departmentData->setCreatedAt(now());
        if($departmentData->getFile()){
            $new_file_name = time() . '.' . $departmentData->getFile()->getClientOriginalExtension();
            $departmentData->setLogo($new_file_name);
            $departmentData->getFile()->storeAs($upload_file_path, $new_file_name);
        }
        return $this->repository->create($departmentData->except('id','file')->toArray());
    }

    /**
     * @param DepartmentData $departmentData
     * @return Model|null
     */
    public function update(DepartmentData $departmentData): ?Model
    {
        $upload_file_path = 'departments/';
        $departmentData->setUpdatedAt(now());
        if($departmentData->getFile()){
            $new_file_name = time() . '.' . $departmentData->getFile()->getClientOriginalExtension();
            $departmentData->setLogo($new_file_name);
            $departmentData->getFile()->storeAs($upload_file_path, $new_file_name);
        }
        return $this->repository->update($departmentData->getId(), $departmentData->except('id', 'created_at','file')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->with('owner','team')->withCount('users')->in(['name'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->with('owner','team')->withCount('users')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }
    public function GetCurrentBids()
    {
        return $this->repository->getcurrentbids();
    }
}
