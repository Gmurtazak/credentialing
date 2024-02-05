<?php

namespace App\Repositories\Account;

use DB;
use Carbon\Carbon;
use Hamcrest\Core\IsNull;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use App\Support\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class AccountRepository extends BaseRepository implements IAccountRepository
{
    public function __construct(Model $account)
    {
        parent::__construct($account);
    }
    public function GetAccountProject($Accountproject): mixed
    {
        $Accountproject = DB::table('users_accounts')->where('accounts_id',$Accountproject)->get()->pluck('user_id')->toArray();
        $Accountsale = DB::table('project_sales')->where([['project_sales.created_by',$Accountproject],['is_convertion' ,'=', 1]])->groupBy('project_sales.created_by')->sum('project_sales.project_price');

        return $Accountsale;
    }
    public function GetAccountBySale(): mixed
    {
        //$Accountsale = DB::table('project_sales')->where([['project_sales.created_by',$Accountproject],['is_convertion' ,'=', 1]])->groupBy('project_sales.created_by')->sum('project_sales.project_price');
        $Accountsale = DB::table('project_sales')
            ->leftJoin('users_accounts', 'users_accounts.user_id', '=', 'project_sales.created_by')
            ->leftJoin('accounts', 'accounts.id', '=', 'users_accounts.accounts_id')
            ->leftJoin('project_sale_details', 'project_sale_details.project_sale_id', '=', 'project_sales.id')
            ->select('accounts.name AS n',DB::raw('count(project_sales.id) AS b'),DB::raw('sum(project_sale_details.connect_uses) AS c'))
            ->WhereNull('project_sale_details.sale_amount')
            ->whereMonth('project_sales.created_at', date('m'))
            ->groupBy('project_sales.created_by')
            ->get();

        return $Accountsale;
    }
}
