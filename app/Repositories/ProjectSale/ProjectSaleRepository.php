<?php

namespace App\Repositories\ProjectSale;

use App\Models\ProjectSale;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ProjectSaleRepository extends BaseRepository implements IProjectSaleRepository
{
    public function __construct(Model $projectSale)
    {
        parent::__construct($projectSale);
    }

    public function resetStatus()
    {
        $date = Carbon::today();
        return $this->model->where('is_convertion','!=','0')->whereDate('created_at','<=',$date->subDays(ProjectSale::resetDays))->get();
    }
    public function getCurrentProject($id)
    {
        $ondate = Carbon::today()->format('Y-m-d');
        return $this->model->where('created_by',$id)->whereDate('created_at','>=',$ondate)->get();
    }
    public function getallproject()
    {
         $allProjectSales = DB::table('project_sales')->count('id');
        return $allProjectSales;
    }
    public function getprojectprice()
    {
        $allProjectSales = DB::table('project_sales')->sum('project_price');
        return $allProjectSales;
    }
    public function getsaleamount()
    {
        $allProjectSales = DB::table('project_sale_details')->sum('sale_amount');
        return $allProjectSales;
    }
    public function getamountreceived()
    {
        $allProjectSales = DB::table('project_sale_details')->sum('amount_received');
        return $allProjectSales;
    }
    public function getamountdue()
    {
        $allProjectSales = DB::table('project_sale_details')->sum('amount_due');
        return $allProjectSales;
    }
//        public function getUserTarget()
//    {
//        $ondate = Carbon::today()->format('Y-m');
//        $userid = DB::table("project_sale_details")
//            ->select('roles.target AS target','users.image AS image','users.name AS uname','project_sales.created_by AS user', DB::raw('(CASE WHEN project_sale_agent_details.bidder_id = project_sale_agent_details.closer_id THEN sum(project_sale_details.sale_amount)  ELSE sum(project_sale_details.sale_amount)  / 2 END) AS usersale'),DB::raw('(CASE WHEN project_sale_agent_details.bidder_id = project_sale_agent_details.closer_id THEN sum(project_sale_details.sale_amount) * 100 / roles.target ELSE sum(project_sale_details.sale_amount)  / 2 * 100 / roles.target END) AS filtersort'))
//            ->leftJoin('project_sales', 'project_sales.id', '=', 'project_sale_details.project_sale_id')
//            ->leftJoin('users', 'users.id', '=', 'project_sales.created_by')
//            ->leftJoin('users_roles', 'users_roles.user_id', '=', 'project_sales.created_by')
//            ->leftJoin('roles', 'roles.id', '=', 'users_roles.role_id')
//            ->leftJoin('project_sale_agent_details', 'project_sale_agent_details.project_sale_id', '=', 'project_sales.id')
//            ->where('project_sale_details.sale_amount', '!=', 0)
//            ->whereDate('project_sale_details.date','>=',$ondate.'-01')
//            ->groupBy('project_sales.created_by','roles.id')
//            ->orderBy('filtersort','DESC')
//            ->limit(5)
//            ->get();
//        //->groupBy('project_sales.created_by');
//        return $userid;
//
//    }
    public function getUserTarget()
    {
        $ondate = Carbon::today()->format('Y-m');

        $userid = DB::table("project_sale_details")
            ->select(
                'roles.target AS target',
                'users.image AS image',
                'users.name AS uname',
                'project_sales.created_by AS user',
                DB::raw('(CASE WHEN project_sale_agent_details.bidder_id = project_sale_agent_details.closer_id THEN sum(project_sale_details.sale_amount) ELSE sum(project_sale_details.sale_amount) / 2 END) AS usersale'),
                DB::raw('(CASE WHEN project_sale_agent_details.bidder_id = project_sale_agent_details.closer_id THEN sum(project_sale_details.sale_amount) * 100 / roles.target ELSE sum(project_sale_details.sale_amount) / 2 * 100 / roles.target END) AS filtersort')
            )
            ->leftJoin('project_sales', 'project_sales.id', '=', 'project_sale_details.project_sale_id')
            ->leftJoin('users', 'users.id', '=', 'project_sales.created_by')
            ->leftJoin('users_roles', 'users_roles.user_id', '=', 'project_sales.created_by')
            ->leftJoin('roles', 'roles.id', '=', 'users_roles.role_id')
            ->leftJoin('project_sale_agent_details', 'project_sale_agent_details.project_sale_id', '=', 'project_sales.id')
            ->where('project_sale_details.sale_amount', '!=', 0)
            ->whereDate('project_sale_details.date', '>=', $ondate . '-01')
            ->groupBy('project_sales.created_by', 'roles.id')
            ->orderBy('filtersort', 'DESC')
            ->limit(5)
            ->get();

        foreach ($userid as $userr) {
            $salesData = DB::table("project_sale_details")
                ->select(
                    'project_sale_details.sale_amount AS sale_amount',
                    'project_sale_details.date AS sale_date'
                )
                ->leftJoin('project_sales', 'project_sales.id', '=', 'project_sale_details.project_sale_id')
                ->where('project_sales.created_by', '=', $userr->user)
                ->whereMonth('project_sale_details.date', '=', date('m'))
                ->orderBy('project_sale_details.created_at', 'DESC')
                ->limit(2)
                ->get();

        }
        return $userid;
    }
    public function getsortUsertarget($month)
    {

        $dateS = $month.'-01';
        $dateE = $month.'-30';
        $userid = DB::table("project_sale_details")
            ->select('roles.target AS target','users.image AS image','users.name AS uname','project_sales.created_by AS user', DB::raw('(CASE WHEN project_sale_agent_details.bidder_id = project_sale_agent_details.closer_id THEN sum(project_sale_details.sale_amount)  ELSE sum(project_sale_details.sale_amount)  / 2 END) AS usersale'))
            ->leftJoin('project_sales', 'project_sales.id', '=', 'project_sale_details.project_sale_id')
            ->leftJoin('users', 'users.id', '=', 'project_sales.created_by')
            ->leftJoin('users_roles', 'users_roles.user_id', '=', 'project_sales.created_by')
            ->leftJoin('roles', 'roles.id', '=', 'users_roles.role_id')
            ->leftJoin('project_sale_agent_details', 'project_sale_agent_details.project_sale_id', '=', 'project_sales.id')
            ->where('project_sale_details.sale_amount', '!=', 0)
            ->whereBetween('project_sale_details.date',[$dateS,$dateE])
            ->groupBy('project_sales.created_by','roles.id')
            ->orderBy('usersale','DESC')
            ->limit(5)
            ->get();
        //->groupBy('project_sales.created_by');
        return $userid;

    }

    public function getCurrentsale()
    {
        $currentyear = DB::table('project_sale_details')
            ->select(DB::raw('sum(project_sale_details.sale_amount) as usersale'),DB::raw('MONTH(project_sale_details.date) as month'))
            ->leftJoin('project_sales','project_sales.id', '=', 'project_sale_details.project_sale_id')
            ->where('project_sale_details.sale_amount', '!=', 0)
            ->whereYear('project_sale_details.date', date('Y'))
            ->groupBy(DB::raw('MONTH(project_sale_details.date)'))
            ->orderBy('month','ASC')->get();

        $lastyear = DB::table('project_sale_details')
            ->select(DB::raw('sum(project_sale_details.sale_amount) as usersale'),DB::raw('MONTH(project_sale_details.date) as month'))
            ->leftJoin('project_sales','project_sales.id', '=', 'project_sale_details.project_sale_id')
            ->where('project_sale_details.sale_amount', '!=', 0)
            ->whereYear('project_sale_details.date', '2022')
            ->groupBy(DB::raw('MONTH(project_sale_details.date)'))
            ->orderBy('month','ASC')->get();
        ;
        return ['current_year'=> $currentyear,
                'last_year'=> $lastyear, ];
    }
    public function getlastsale()
    {
        $dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $dateE = Carbon::now()->startOfMonth();
        $sale = DB::table('project_sale_details')
            ->select(DB::raw('sum(project_sale_details.sale_amount) as sale'),DB::raw('MONTH(project_sale_details.date) as month'))
            ->leftJoin('project_sales','project_sales.id', '=', 'project_sale_details.project_sale_id')
            ->where('project_sale_details.sale_amount', '!=', 0)
            ->whereBetween('project_sale_details.date',[$dateS,$dateE])
            ->groupBy(DB::raw('MONTH(project_sale_details.date)'))
            ->orderBy('month','ASC')->get();
//        $TotalSpent = DB::table('orders')
//            ->select('total_cost','placed_at')
//            ->whereBetween('placed_at',[$dateS,$dateE])
//            ->where(['deleted' => '0', 'delivery_address_id' => $DeliveryAddress->id])
//            ->sum('total_cost');
//dd($sale);
        return ['varl_last_month'=> $sale,];
    }
}
