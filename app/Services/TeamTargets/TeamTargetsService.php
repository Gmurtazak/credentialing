<?php

namespace App\Services\TeamTargets;

use App\Dto\TeamTargetsData;
use App\Repositories\TeamTargets\ITeamTargetsRepository;
use App\Support\Dto\ListViewData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Exception;


class TeamTargetsService
{
    /**
     * @var
     */
    protected $repository;

    public function __construct(ITeamTargetsRepository $teamTargetsRepository)
    {
        $this->repository = $teamTargetsRepository;
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
        return $this->repository->with('team')->sortBy('id','desc')->all();
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

    public function create(TeamTargetsData $teamtargets): ?Model
    {
        $teamtargets->setCreatedAt(now());
        return $this->repository->create($teamtargets->except('id')->toArray());
    }

    public function update(TeamTargetsData $teamtargets): ?Model
    {
        $teamtargets->setCreatedAt(now());
        return $this->repository->update($teamtargets->getId(), $teamtargets->except('id', 'created_at')->toArray());
    }



    /**
     * @param ListViewData $listViewData
     * @return mixed
     */
    public function datatable(ListViewData $listViewData): mixed
    {
        $perPage = $listViewData->perPage;
        if ($listViewData->query) {
            return $this->repository->with('team')->in(['team_id'])->search($listViewData->query)->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
                    } else {
            return $this->repository->with('team')->withPagination($perPage)->sortBy($listViewData->sortByColumn, $listViewData->sortByDirection)->all();
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

    public function getteamname($teamid): mixed
    {
        return $this->repository->getteamname($teamid);
    }
    public function getteamtarget(int $team_id): mixed
    {
        return $this->repository->getteamtarget($team_id);
    }

    public function getteamproject(int $team_id): mixed
    {
        return $this->repository->getteamproject($team_id);
    }
    public function GetAllTeamTarget()
    {
        return $this->repository->getAllteamTarget();
    }
    public function GetSortTeamTarget($month)
    {
        return $this->repository->getSortTeamTarget($month);
    }
    public function GetAllSortTeamTarget($month)
    {
        return $this->repository->getAllSortTeamTarget($month);
    }
    public function GetAllYearTarget()
    {
        return $this->repository->getAllyearTarget();
    }

}
