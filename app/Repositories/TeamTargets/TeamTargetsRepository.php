<?php

namespace App\Repositories\TeamTargets;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class TeamTargetsRepository extends BaseRepository implements ITeamTargetsRepository
{
    public function __construct(Model $teamtargets)
    {
        parent::__construct($teamtargets);
    }

    public function getteamname($teamname)
    {
        $a = $teamname;
       $ondate = Carbon::today()->format('Y-m');

        $teamname = \DB::table('teams')
            ->select('team_targets.target AS target','teams.name AS name', DB::raw('sum(project_sale_details.sale_amount) as usersale'))
            ->leftJoin('team_targets', 'team_targets.team_id', '=', 'teams.id')
            ->leftJoin('project_sales', 'project_sales.team_id', '=', 'team_targets.team_id')
            ->leftJoin('project_sale_details', 'project_sale_details.project_sale_id', '=', 'project_sales.id')
            ->where('teams.id',$teamname)
            ->where('team_targets.month','=', $ondate)
            ->groupBy('project_sales.team_id')
            ->get();

        $teammember = DB::table("project_sale_details")
            ->select('roles.target AS target','users.name AS uname','users.image AS image','project_sales.created_by AS user', DB::raw('sum(project_sale_details.sale_amount) as usersale'))
            ->leftJoin('project_sales', 'project_sales.id', '=', 'project_sale_details.project_sale_id')
            ->leftJoin('users', 'users.id', '=', 'project_sales.created_by')
            ->leftJoin('users_roles', 'users_roles.user_id', '=', 'project_sales.created_by')
            ->leftJoin('roles', 'roles.id', '=', 'users_roles.role_id')
            ->where('project_sale_details.sale_amount', '!=', 0)
            ->where('project_sales.team_id',$a)
            ->groupBy('project_sales.created_by','roles.id')
            ->orderBy('usersale','DESC')
            ->get();

        return ['team_name'=> $teamname,
            'team_member'=> $teammember, ];

    }
    public function getteamtarget($teamtargetid): mixed
    {
        $ondate = Carbon::today()->format('Y-m');
        $teamtargetid = \DB::table('team_targets')
            ->join('users', 'users.team_id', '=', 'team_targets.team_id')
            ->where('users.id',$teamtargetid)->where('team_targets.month','=',$ondate)->sum('team_targets.target');
        return $teamtargetid;
    }

    public function getteamproject($teamproject): mixed
    {
       $teamproject = \DB::table('project_sales')
        ->leftJoin('project_sale_details','project_sale_details.project_sale_id', '=','project_sales.id' )
        ->where([['project_sales.team_id',$teamproject],['project_sales.is_convertion' ,'=', 1],['project_sale_details.sale_amount', '!=', 0]])
        ->sum('project_sale_details.sale_amount');

        return $teamproject;
    }

    public function getAllteamTarget(): mixed
    {
        $ondate = Carbon::today()->format('2023-03');
        $teamTarget = \DB::table('team_targets')
            ->where('team_targets.month','=',$ondate)
            ->sum('team_targets.target');
        $ondate = Carbon::today()->format('Y-m');
        $ondate = $ondate.'-1';
        $teamsale = \DB::table('project_sale_details')
            ->whereDate('project_sale_details.date','>=',$ondate)->sum('sale_amount');
        return ['team_target'=> $teamTarget,
            'Sale'=> $teamsale, ];
        return $teamproject;
    }

    public function getSortTeamTarget($month): mixed
    {

        $teamTarget = \DB::table('team_targets')
            ->where('team_targets.month','=',$month)
            ->sum('team_targets.target');

        $ondate = $month.'-1';
        $teamsale = \DB::table('project_sale_details')
            ->whereDate('project_sale_details.date','>=',$ondate)->sum('sale_amount');
        return ['team_target'=> $teamTarget,
            'Sale'=> $teamsale, ];
    }

    public function getAllSortTeamTarget($month): mixed
    {
        $teamTarget = \DB::table('team_targets')
            ->select('teams.name AS name',DB::raw('sum(team_targets.target) as target'))
            ->leftJoin('teams', 'teams.id', '=', 'team_targets.team_id')
            ->where('team_targets.month','=',$month)
            ->groupBy('team_targets.team_id')
            ->get();

        $ondate = $month.'-1';
        $teamsale = \DB::table('project_sale_details')
            ->select(DB::raw('sum(project_sale_details.sale_amount) as sale'))
            ->leftJoin('project_sales', 'project_sales.id', '=', 'project_sale_details.project_sale_id')
            ->whereDate('project_sale_details.date','>=',$ondate)
            ->groupBy('project_sales.team_id')
            ->get();
        return ['team_target'=> $teamTarget, 'Sale'=> $teamsale, ];
    }
    public function getAllyearTarget(): mixed
    {
        $ondate = Carbon::today()->format('Y');
        $teamTarget = \DB::table('portal_targets')
            ->where('portal_targets.year','=',$ondate)
            ->sum('portal_targets.target');
            //->where('','=',$ondate)
        $ondate = Carbon::today()->format('Y');
        //$ondate = $ondate.'-1';
        $teamsale = \DB::table('project_sale_details')
            ->where( DB::raw('YEAR(project_sale_details.date)'), '=', $ondate )->sum('sale_amount');
        return ['year_target'=> $teamTarget,
            'yearSale'=> $teamsale, ];
        return $teamproject;
    }
}
