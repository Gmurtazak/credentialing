<?php

namespace App\Services\BusinessType;

use App\Dto\BusinessTypeData;
use App\Models\BusinessType;
use App\Repositories\BusinessType\IBusinessTypeRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class BusinessTypeService
{
    /**
     * @var
     */
    protected IBusinessTypeRepository $repository;

    /**
     * @param IBusinessTypeRepository $businessTypeRepository
     */
    public function __construct(IBusinessTypeRepository $businessTypeRepository)
    {
        $this->repository = $businessTypeRepository;
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
     * @param BusinessTypeData $businessTypeData
     * @return Model|null
     */
    public function create(BusinessTypeData $businessTypeData): ?Model
    {
        $businessTypeData->setCreatedAt(now());
        return $this->repository->create($businessTypeData->except('id')->toArray());
    }

    /**
     * @param BusinessTypeData $businessTypeData
     * @return Model|null
     */
    public function update(BusinessTypeData $businessTypeData): ?Model
    {
        $businessTypeData->setUpdatedAt(now());
        return $this->repository->update($businessTypeData->getId(), $businessTypeData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['business_type_name'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
