<?php

namespace App\Services\Insurance;

use App\Dto\InsuranceData;
use App\Models\Insurance;
use App\Repositories\Insurance\IInsuranceRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class InsuranceService
{
    /**
     * @var
     */
    protected IInsuranceRepository $repository;

    public function __construct(IInsuranceRepository $insuranceRepository)
    {
        $this->repository = $insuranceRepository;
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
     * @param InsuranceData $insuranceData
     * @return Model|null
     */
    public function create(InsuranceData $insuranceData): ?Model
    {
        $insuranceData->setCreatedAt(now());
        return $this->repository->create($insuranceData->except('id')->toArray());
    }

    /**
     * @param InsuranceData $insuranceData
     * @return Model|null
     */
    public function update(InsuranceData $insuranceData): ?Model
    {
        $insuranceData->setUpdatedAt(now());
        return $this->repository->update($insuranceData->getId(), $insuranceData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        $pageUrl = ($listViewData->isExternalPath)?route('api.insurance.all'):route('insurance');
        if ($listViewData->query) {
            return $this->repository->in(['name','plan_group'])->search($listViewData->query)->withPagination($perPage)->withPaginationPath($pageUrl)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->withPaginationPath($pageUrl)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
