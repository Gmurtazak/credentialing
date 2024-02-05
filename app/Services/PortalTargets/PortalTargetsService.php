<?php

namespace App\Services\PortalTargets;

use App\Dto\PortalTargetsData;
use App\Repositories\PortalTargets\IPortalTargetsRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class PortalTargetsService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(IPortalTargetsRepository $portaltargetsRepository)
    {
        $this->repository = $portaltargetsRepository;
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

    public function create(PortalTargetsData $portaltargets): ?Model
    {
        $portaltargets->setCreatedAt(now());
        return $this->repository->create($portaltargets->except('id')->toArray());
    }

    public function update(PortalTargetsData $portaltargets): ?Model
    {
        $portaltargets->setUpdatedAt(now());
        return $this->repository->update($portaltargets->getId(), $portaltargets->except('id', 'created_at')->toArray());


    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['team_id'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
                    } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

    /**
     * @param $target
     * @return mixed
     */
    public static function getAllroletarget($target): mixed
    {

        $target = \DB::table('roles')
            ->join('users_roles','roles.id','=','users_roles.role_id')
            ->join('users', 'users.id', '=', 'users_roles.user_id')
            ->where('users.team_id',$target)->sum('roles.target');
        return $target;
    }

}
