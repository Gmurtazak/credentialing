<?php

namespace App\Services\ProjectSaleAgentDetail;

use App\Dto\ProjectSaleAgentDetailData;
use App\Models\ProjectSaleAgentDetail;;
use App\Repositories\ProjectSaleAgentDetail\IProjectSaleAgentDetailRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class ProjectSaleAgentDetailService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IProjectSaleAgentDetailRepository $projectSaleAgentDetailRepository)
    {
        $this->repository = $projectSaleAgentDetailRepository;
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

    public function create(ProjectSaleAgentDetailData $projectSaleAgentDetailData): ?Model
    {
        $projectSaleAgentDetailData->setCreatedAt(now());
        return $this->repository->create($projectSaleAgentDetailData->except('id')->toArray());
    }

    public function update(ProjectSaleAgentDetailData $projectSaleAgentDetailData): ?Model
    {
        $projectSaleAgentDetailData->setUpdatedAt(now());
        return $this->repository->update($projectSaleAgentDetailData->getId(), $projectSaleAgentDetailData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['name'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }
}
