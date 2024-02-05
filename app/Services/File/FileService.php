<?php

namespace App\Services\File;

use App\Dto\FileData;
use App\Models\File;
use App\Repositories\File\IFileRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class FileService
{
    /**
     * @var
     */
    protected IFileRepository $repository;

    /**
     * @param IFileRepository $fileRepository
     */
    public function __construct(IFileRepository $fileRepository)
    {
        $this->repository = $fileRepository;
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
     * @param FileData $fileData
     * @return Model|null
     */
    public function create(FileData $fileData): ?Model
    {
        $fileData->setCreatedAt(now());
        return $this->repository->create($fileData->except('id')->toArray());
    }

    /**
     * @param FileData $fileData
     * @return Model|null
     */
    public function update(FileData $fileData): ?Model
    {
        $fileData->setUpdatedAt(now());
        return $this->repository->update($fileData->getId(), $fileData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['file_name'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

}
