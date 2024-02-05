<?php

namespace App\Services\Entity;

use App\Dto\EntityData;
use App\Models\Entity;
use App\Repositories\Entity\IEntityRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class EntityService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IEntityRepository $entityRepository)
    {
        $this->repository = $entityRepository;
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

    /**
     * @param EntityData $entityData
     * @return Model|null
     */
    public function create(EntityData $entityData): ?Model
    {
        $entityData->setCreatedAt(now());
        return $this->repository->create($entityData->except('id')->toArray());
    }

    /**
     * @param EntityData $entityData
     * @return Model|null
     */
    public function update(EntityData $entityData): ?Model
    {
        $entityData->setUpdatedAt(now());
        return $this->repository->update($entityData->getId(), $entityData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['entity'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }
}
