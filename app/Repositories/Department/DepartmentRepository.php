<?php

namespace App\Repositories\Department;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class DepartmentRepository extends BaseRepository implements IDepartmentRepository
{
    public function __construct(Model $department)
    {
        parent::__construct($department);
    }
    public function getcurrentbids()
    {
        $ondate = Carbon::today()->format('Y-m');
        $allcurrentbids = DB::table('project_sales')
            ->select('departments.name AS name', DB::raw('count(project_sales.id) AS y'))
            ->leftJoin('teams', 'teams.id', '=', 'project_sales.team_id')
            ->leftJoin('departments', 'departments.id', '=', 'teams.department_id')
            ->leftJoin('project_sale_details', 'project_sale_details.project_sale_id', '=', 'project_sales.id')
            ->whereDate('project_sales.created_at','>=',$ondate.'-01')
            ->groupBy('departments.id')
            ->get();
        $allcurrentconeect = DB::table('project_sales')
            ->select('departments.name AS name',DB::raw('sum(project_sale_details.connect_uses) AS c'))
            ->leftJoin('teams', 'teams.id', '=', 'project_sales.team_id')
            ->leftJoin('departments', 'departments.id', '=', 'teams.department_id')
            ->leftJoin('project_sale_details', 'project_sale_details.project_sale_id', '=', 'project_sales.id')
            ->whereDate('project_sales.created_at','>=',$ondate.'-01')
            ->groupBy('departments.id')
            ->get();
        return ['current_bids'=> $allcurrentbids,
            'current_coneect'=> $allcurrentconeect, ];

        //return $allProjectSales;
    }
}
