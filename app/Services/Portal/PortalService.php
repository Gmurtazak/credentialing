<?php

namespace App\Services\Portal;

use App\Dto\PortalData;
use App\Models\Portal;
use App\Repositories\Portal\IPortalRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class PortalService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IPortalRepository $portalRepository)
    {
        $this->repository = $portalRepository;
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
     * @param PortalData $portalData
     * @return Model|null
     */
    public function create(PortalData $portalData): ?Model
    {
        $upload_file_path = 'insurance/';
        $portalData->setCreatedAt(now());
        $new_file_name = time() . '.' . $portalData->getFile()->getClientOriginalExtension();
        $portalData->setLogo($new_file_name);
        $portalData->getFile()->storeAs($upload_file_path, $new_file_name);
        return $this->repository->create($portalData->except('id','file')->toArray());

    }

    /**
     * @param PortalData $portalData
     * @return Model|null
     */
    public function update(PortalData $portalData): ?Model
    {
        $portalData->setUpdatedAt(now());
        return $this->repository->update($portalData->getId(), $portalData->except('id', 'created_at')->toArray());
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

    public function getportalproject(int $portalid): mixed
    {
        return $this->repository->getportalproject($portalid);
    }
    public function GetPortalBySale(): mixed
    {
        return $this->repository->GetPortalBySale();
    }
}
