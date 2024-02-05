<?php

namespace App\Services\Category;

use App\Dto\CategoryData;
use App\Models\Category;
use App\Repositories\Category\ICategoryRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class CategoryService
{
    /**
     * @var
     */
    protected ICategoryRepository $repository;

    /**
     * @param ICategoryRepository $categoryRepository
     */
    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
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
     * @param CategoryData $categoryData
     * @return Model|null
     */
    public function create(CategoryData $categoryData): ?Model
    {
        $categoryData->setCreatedAt(now());
        return $this->repository->create($categoryData->except('id')->toArray());
    }

    /**
     * @param CategoryData $categoryData
     * @return Model|null
     */
    public function update(CategoryData $categoryData): ?Model
    {
        $categoryData->setUpdatedAt(now());
        return $this->repository->update($categoryData->getId(), $categoryData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['category'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
