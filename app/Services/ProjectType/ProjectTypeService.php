<?php

namespace App\Services\ProjectType;

use App\Dto\ProjectTypeData;
use App\Models\ProjectType;
use App\Repositories\ProjectType\IProjectTypeRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class ProjectTypeService
{
    /**
     * @var
     */
    protected IProjectTypeRepository $repository;

    /**
     * @param IProjectTypeRepository $categoryRepository
     */
    public function __construct(IProjectTypeRepository $projectTypeRepository)
    {
        $this->repository = $projectTypeRepository;
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
     * @param $attr
     * @param $value
     * @return Collection|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAllByAttribute($attr,$value): Collection|\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->repository->findAllByAttribute($attr, $value);
    }

    /**
     * @param ProjectTypeData $projectTypeData
     * @return Model|null
     */
    public function create(ProjectTypeData $projectTypeData): ?Model
    {
        $projectTypeData->setCreatedAt(now());
        return $this->repository->create($projectTypeData->except('id')->toArray());
    }

    /**
     * @param ProjectTypeData $projectTypeData
     * @return Model|null
     */
    public function update(ProjectTypeData $projectTypeData): ?Model
    {
        $projectTypeData->setUpdatedAt(now());
        return $this->repository->update($projectTypeData->getId(), $projectTypeData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['type'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
