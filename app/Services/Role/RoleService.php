<?php

namespace App\Services\Role;

use App\Dto\RoleData;
use App\Models\Role;
use App\Repositories\Right\IRightRepository;
use App\Repositories\Role\IRoleRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\User\IUserRepository;
use \Exception;


class RoleService
{
    /**
     * @var
     */
    protected $repository;
    protected $rightRepository;

    public function __construct(IRoleRepository $roleRepository,IRightRepository $rightRepository)
    {
        $this->repository = $roleRepository;
        $this->rightRepository = $rightRepository;
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
     * @param RoleData $roleData
     * @return Model|null
     */
    public function create(RoleData $roleData): ?Model
    {
        $roleData->setCreatedAt(now());
        return $this->repository->create($roleData->except('id')->toArray());
    }

    /**
     * @param RoleData $roleData
     * @return Model|null
     */
    public function update(RoleData $roleData): ?Model
    {
        $roleData->setUpdatedAt(now());
        return $this->repository->update($roleData->getId(), $roleData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['role'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        } else {
            return $this->repository->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
        }
    }

    public function getAll(ListViewData $listViewData){
        $allRoles = $this->repository->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all()->pluck('role','id');
        $allRights = $this->rightRepository->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all()->pluck('right','id');
        $data = [];
        $roleRights = [];
        foreach($allRoles->toArray() as $ro_id =>$role){
            //$roleDetail = $this->repository->with('rights')->getByIdWithoutFail($ro_id);
            $roleDetail = \DB::table('roles_rights')
                ->join('rights', 'roles_rights.right_id', '=', 'rights.id')
                ->where('roles_rights.role_id',$ro_id)->get()->toArray();
            if ($roleDetail) {
                $roleRights = $roleDetail;
            } else{
                $roleRights = [];
            }

            foreach($allRights->toArray() as $ri_id =>$right){
                $found = array_search($ri_id, array_column($roleRights, 'right_id'));
                $object[$ro_id][] = [
                    'id' => $ri_id,
                    'name' => $right,
                    //'is_checked' => ((array_key_exists($ri_id, $roleRights)) ?? 0)
                    'is_checked'=>(is_numeric($found))??0
                ];
            }
            $data[] = [
                'id' => $ro_id,
                'name' => $role,
                'rights'=>$object[$ro_id]
            ];
        }
        return $data;
    }
}
