<?php

namespace App\Services\Team;

use App\Dto\TeamData;
use App\Repositories\Team\ITeamRepository;
use App\Support\Dto\ListViewData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class TeamService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(ITeamRepository $teamRepository)
    {
        $this->repository = $teamRepository;
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

    public function create(TeamData $teamData): ?Model
    {
        $teamData->setCreatedAt(now());
        /*$upload_file_path = 'teams/';
        if($teamData->getFile()){
            $new_file_name = time() . '.' . $teamData->getFile()->getClientOriginalExtension();
            $teamData->setLogo($new_file_name);
            $teamData->getFile()->storeAs($upload_file_path, $new_file_name);
        }*/
        return $this->repository->create($teamData->except('id')->toArray());
    }

    public function update(TeamData $teamData): ?Model
    {
        $teamData->setUpdatedAt(now());
        return $this->repository->update($teamData->getId(), $teamData->except('id', 'created_at')->toArray());
    }

    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->in(['name'])->in(['is_active'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
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
