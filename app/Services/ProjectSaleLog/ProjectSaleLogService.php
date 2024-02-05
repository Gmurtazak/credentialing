<?php

namespace App\Services\ProjectSaleLog;

use App\Dto\ProjectSaleLogData;
use App\Models\projectSaleLog;
use App\Repositories\ProjectSaleLog\IProjectSaleLogRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class ProjectSaleLogService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IProjectSaleLogRepository $projectSaleSaleRepository)
    {
        $this->repository = $projectSaleSaleRepository;
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

    public function create(projectSaleLogData $projectSaleLogData): ?Model
    {
        $projectSaleLogData->setCreatedAt(now());
        return $this->repository->create($projectSaleLogData->except('id')->toArray());
    }

    public function update(ProjectSaleLogData $projectSaleLogData): ?Model
    {
        $projectSaleLogData->setCreatedAt(now());
        return $this->repository->update($projectSaleLogData->getId(), $projectSaleLogData->except('id', 'created_at')->toArray());
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
    public function ProjectSaleLog($id)
    {
        return $this->repository->where('project_sale_id',$id)->withPagination(10)->with('projectSale.client')->all();

    }
}
