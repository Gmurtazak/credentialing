<?php

namespace App\Services\Project;

use App\Dto\ProjectData;
use App\Models\Project;
use App\Repositories\Project\IProjectRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class ProjectService
{
    /**
     * @var
     */
    protected IProjectRepository $repository;

    /**
     * @param IProjectRepository $projectRepository
     */
    public function __construct(IProjectRepository $projectRepository)
    {
        $this->repository = $projectRepository;
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
     * @param ProjectData $projectData
     * @return Model|null
     */
    public function create(ProjectData $projectData): ?Model
    {
        $projectData->setCreatedAt(now());
        return $this->repository->create($projectData->except('id')->toArray());
    }

    /**
     * @param ProjectData $projectData
     * @return Model|null
     */
    public function update(ProjectData $projectData): ?Model
    {
        $projectData->setUpdatedAt(now());
        return $this->repository->update($projectData->getId(), $projectData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['name'])->withCount('users')->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withCount('users')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
