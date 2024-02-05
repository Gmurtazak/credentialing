<?php

namespace App\Repositories\Portal;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class PortalRepository extends BaseRepository implements IPortalRepository
{
    public function __construct(Model $portal)
    {
        parent::__construct($portal);
    }
    public function getportalproject($portalproject): mixed
    {
        $portalproject = \DB::table('project_sales')->where([['project_sales.portal_id',$portalproject],['is_convertion' ,'=', 1]])->sum('project_sales.project_price');
        return $portalproject;
    }
    public function GetPortalBySale(): mixed
    {
        //$Accountsale = DB::table('project_sales')->where([['project_sales.created_by',$Accountproject],['is_convertion' ,'=', 1]])->groupBy('project_sales.created_by')->sum('project_sales.project_price');
        $Portasale = DB::table('project_sales')
            ->leftJoin('project_sale_details', 'project_sale_details.project_sale_id', '=', 'project_sales.id')
            ->leftJoin('portals', 'portals.id', '=', 'project_sales.portal_id')
            ->select('portals.name AS n',DB::raw('count(project_sales.id) AS b'),DB::raw('sum(project_sale_details.connect_uses) AS c'))
            ->whereMonth('project_sales.created_at', date('m'))
            ->groupBy('project_sales.portal_id')
            ->get();
        return $Portasale;
    }
}
