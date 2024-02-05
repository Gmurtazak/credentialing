<?php

namespace App\Http\Controllers\Api\v1\ProjectSale;

use App\Dto\ClientData;
use App\Dto\ProjectSaleAgentDetailData;
use App\Dto\ProjectSaleData;
use App\Dto\ProjectSaleDetailData;
use App\Dto\ProjectSaleLogData;
use App\Dto\ProjectSaleProductionDetailData;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectSale\AddProjectSaleRequest;
use App\Http\Requests\ProjectSale\EditProjectSaleRequest;
use App\Http\Requests\ProjectSale\GetProjectSaleDetailRequest;
use App\Services\ProjectSale\ProjectSaleService;
use App\Services\ProjectSaleDetail\ProjectSaleDetailService;
use App\Models\ProjectSale;
use App\Services\EmailService;
use App\Services\Client\ClientService;
use App\Services\ProjectSaleLog\ProjectSaleLogService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;
use Illuminate\Support\Facades\Session;
use App\Services\User\UserService;
use App\Services\TeamTargets\TeamTargetsService;

/**
 *
 */
class ProjectSaleController extends Controller
{
    /**
     * @param ProjectSaleService $projectSale
     * @param EmailService $email
     * @param UserService $user
     * @param ProjectSaleLogService $email
     */
    public function __construct(public ProjectSaleService $projectSale,public ProjectSaleDetailService $ProjectSaleDetailService, public EmailService $email,public UserService $user, public ClientService $client, public ProjectSaleLogService $projectSaleLog,public TeamTargetsService $teamtarget)
    {
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function all(Request $request) : \Illuminate\Http\JsonResponse
    {

        $code = 200;
        $sale =null;
        if(isset($request->non_sale)){
            $sale= $request->non_sale;
        }
        $team = 0;
        if(isset($request->team)){
            $team= $request->team;
        }
        $allProjectSales = $this->projectSale->datatable(ListViewData::fromRequest($request),$sale);


        $totalSaleAmount = $allProjectSales->sum(function ($product) {
            return ($product->projectSaleDetail->sale_amount ?? 0);
        });
        $totalAmountDue = $allProjectSales->sum(function ($product) {
            return ($product->projectSaleDetail->amount_due ?? 0);
        });
        $totalAmountReceived = $allProjectSales->sum(function ($product) {
            return ($product->projectSaleDetail->amount_received ?? 0);
        });
        $totalAmountRefund = $allProjectSales->sum(function ($product) {
            return ($product->projectSaleDetail->amount_refund ?? 0);
        });
        $totalAmountProject = $allProjectSales->sum(function ($product) {
            return ($product->project_price ?? 0);
        });



        $todayprojectcount = $this->projectSale->getcurrentproject($request->userId);
        $teamtarget = $this->teamtarget->getteamtarget($request->userId);
        $teamid = $this->teamtarget->getteamname($team);
        //$checksaleamount = $this->ProjectSaleDetailService->getchecksaleamount($request->get('id'));


        $stats[] = [
            'totalProject' => $allProjectSales->count() ?? 0,
            'totalSaleAmount' => $totalSaleAmount ?? 0,
            'netSaleAmount' => $checksaleamount ?? 0,
            'todayProjectCount' => $todayprojectcount->count(),
            'teamtarget' => $teamtarget ?? 0,
            'totalAmountDue' => $totalAmountDue ?? 0,
            'totalAmountReceived' => $totalAmountReceived ?? 0,
            'totalAmountRefund' => $totalAmountRefund ?? 0,
            'totalAmountProject' => $totalAmountProject ?? 0,
            'teamid' =>  $teamid
        ];

        // $allProjectSales['totalSaleAmount'] = $totalSaleAmount;
        // $allProjectSales['totalAmountDue'] = $totalAmountDue;
        $allProjectSales = $allProjectSales->paginate(20);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All project sales'], 'data' => $allProjectSales->withQueryString(''),'stats'=>$stats];
        return response()->json($output, $code);
    }
    public function gettopfive() : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allProjectSales = $this->projectSale->GetUsertarget();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Get Top Five'], 'data' => $allProjectSales];
        return response()->json($output, $code);
    }
    public function sortgettopfive(Request $request) : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allProjectSales = $this->projectSale->GetSortUsertarget($request->months);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Sort Get Top Five'], 'data' => $allProjectSales];
        return response()->json($output, $code);
    }
    public function getcurrentsale() : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allProjectSales = $this->projectSale->GetCurrentSale();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Get Current Sale'], 'data' => $allProjectSales];
        return response()->json($output, $code);
    }
    public function getlastsale() : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allProjectSales = $this->projectSale->GetLastSale();
        $allProjectSales = collect($allProjectSales['varl_last_month']);
        $result = [];
        $allProjectSales->each(function($item,$key) use(&$result,$allProjectSales){

            $firstInd = $allProjectSales[$key];
            if(array_key_exists(($key+1),$allProjectSales->toArray())) {
                $secondInd = $allProjectSales[$key + 1];

                $result[0]['data'][] = $firstInd->sale;
                $result[0]['name'] = 'Current Month';//$firstInd->month;

                $result[1]['data'][] = $secondInd->sale;
                $result[1]['name'] = 'Next Month';//$firstInd->month;


                $result[2]['data'][] = $firstInd->sale - $secondInd->sale;
                $result[2]['name'] = 'Difference';//$firstInd->month;

//                $b = [];
//                $result['data'][] = $secondInd->sale;
//                $result['name'] = $secondInd->month;
//
//
//                $result['data'][] = $firstInd->sale - $secondInd->sale;
//                $result['name'] = $firstInd->month;


            }
        });
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Get Current last Sale'], 'data' => $result];
        return response()->json($output, $code);
    }
    /**
     * @param AddProjectSaleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(AddProjectSaleRequest $request): \Illuminate\Http\JsonResponse
    {
        if ($request->client_id == null) {
            $clentData = ClientData::fromModel($request);
            $request->merge([
                'client_id' => $this->client->create($clentData)->id,
            ]);
        }
        $code = 200;
        $getlastprojectid = $this->projectSale->create(ProjectSaleData::fromRequest($request));
        $request->merge([
            'project_sale_id' => $getlastprojectid->id,
            'date' => $request->date,
            'connect_uses' => $request->connect_uses,
        ]);
        $projectSaleDetailData = ProjectSaleDetailData::ArrayRequest($request);
        $this->ProjectSaleDetailService->create($projectSaleDetailData);

        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project BID added successfully.'], 'data' => null];
        if ($request->isForm) {
            return redirect('sale')->with('success', 'Project Sale added successfully.');
        } else {
            return response()->json($output, $code);
        }
    }

    /**
     * @param EditProjectSaleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EditProjectSaleRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        if ($request->name != 'Default') {
            $findclient = $this->client->findname($request->name);
            if (count($findclient) > 0) {
                // dd('1');
            } else {
                $clentData = ClientData::fromRequest($request);
                $requestall = $this->client->createbysaleform($clentData);
                $request->merge([
                    'client_id' => $requestall,
                ]);
            }
        }
        $code = 200;
        $projectSale = $this->projectSale->find((int) $request->get('id'));
        $projectsaledetailservice = $this->ProjectSaleDetailService->getchecksaledetail($request->get('id'));



        if ($projectSale !== NULL) {
            $projectSaleLogData = "";
            if ($request->our_bid != $projectSale->our_bid) {
                $projectSaleLogData = ProjectSaleLogData::fromRequest($request);
            }
            $projectSaleData = ProjectSaleData::fromModel($projectSale)->toRequest($request);
            $projectSaleDetailData = ProjectSaleDetailData::fromRequest($request);
            $projectSaleAgentData = ProjectSaleAgentDetailData::fromRequest($request);
            $projectSaleProductionData = ProjectSaleProductionDetailData::fromRequest($request);
            $this->projectSale->update($projectSaleData, $projectSaleDetailData, $projectSaleAgentData, $projectSaleProductionData, $projectSaleLogData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Sale data updated successfully.'], 'data' => $projectSaleData];
            if ($request->isForm) {
                return redirect('sale')->with('success', 'Project Sale data updated successfully.');
            } else {
                return response()->json($output, $code);
            }
        } else {
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Project Sale not found.'], 'data' => null];
        }
        return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allProjectSale = $this->projectSale->datatable(ListViewData::fromRequest($request));
        return response()->json($allProjectSale, $code);
    }

    /**
     * @param GetProjectSaleDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetProjectSaleDetailRequest $request): \Illuminate\Http\JsonResponse
    {

        $code = 200;
        $projectSale   = $this->projectSale->find((int) $request->get('id'));
        $getcreated_by = ProjectSale::where('id',$request->get('id'))->latest()->first();
        //$projectSale["useraccount"]   = UserService::getAllUsersByAccount($getcreated_by->created_by);
        $projectSale["useraccount"]   = $this->user->getAllUsersByAccount($getcreated_by->created_by);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Sale Detail'], 'data' => $projectSale];
        return response()->json($output, $code);

    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetStatus(): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->projectSale->resetStatus();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Sale have been canceled'], 'data' => null];
        return response()->json($output, $code);
    }
    public function getProjectSaleLog(Request $request)
    {
        $code = 200;
        $projectSale  = $this->projectSaleLog->ProjectSaleLog((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Sale Detail'], 'data' => $projectSale];
        return response()->json($output, $code);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function export(){
        $fileName = 'sale-data-'.time().'.csv';
        $allProjectSales = $this->projectSale->all();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('PROJECT NAME','PROJECT TYPE', 'CLIENT', 'PROJECT PRICE',	'OUR BID',	'CONTACT DATE','Portal Name','Sale Amount','Received Amount','Refund Amount','Amount Due','Bidder Name','Closer Name','Caller Name','Team','Status');

        $callback = function() use($allProjectSales, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($allProjectSales as $sale) {
                $row['project_name']  = $sale->project_name;
                $row['project_type']    = $sale->projectType->type;
                $row['client']    = $sale->client->name;
                $row['project_price']  = $sale->project_price;
                $row['our_bid']  = $sale->our_bid;
                $row['contact_date']  = $sale->contact_date;
                $row['potal_id']  = $sale->projectSaleDetail->portal->name ?? " ";
                $row['sale_amount_id']  = $sale->projectSaleDetail->sale_amount ?? " ";
                $row['amount_received_id']  = $sale->projectSaleDetail->amount_received ?? " ";
                $row['amount_refund_id']  = $sale->projectSaleDetail->amount_refund ?? " ";
                $row['amount_due_id']  = $sale->projectSaleDetail->amount_due ?? " ";
                $row['bidder_id']  = $sale->projectSaleAgentDetailForTeam->bidder->name ?? "" ;
                $row['closer_id']  = $sale->projectSaleAgentDetailForTeam->closer->name ?? "";
                $row['callerl_id']  = $sale->projectSaleAgentDetailForTeam->caller->name ?? "";
                $row['team_id']  = $sale->projectSaleAgentDetailForTeam->team->name  ?? "";
                $row['status']  = $sale->is_active == 1 ? "Complete" : "In Progress";
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }
    public function exportNonSale()
    {
        $fileName = 'sale-data-'.time().'.csv';
        $allProjectSales = $this->projectSale->nonSaleProject();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('PROJECT NAME','PROJECT TYPE', 'CLIENT', 'PROJECT PRICE',	'OUR BID',	'CONTACT DATE','Portal Name','Sale Amount','Received Amount','Refund Amount','Amount Due','Bidder Name','Closer Name','Caller Name','Team','Status');

        $callback = function() use($allProjectSales, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($allProjectSales as $sale) {
                $row['project_name']  = $sale->project_name;
                $row['project_type']    = $sale->projectType->type;
                $row['client']    = $sale->client->name;
                $row['project_price']  = $sale->project_price;
                $row['our_bid']  = $sale->our_bid;
                $row['contact_date']  = $sale->contact_date;
                $row['potal_id']  = $sale->projectSaleDetail->portal->name ?? " ";
                $row['sale_amount_id']  = $sale->projectSaleDetail->sale_amount ?? " ";
                $row['amount_received_id']  = $sale->projectSaleDetail->amount_received ?? " ";
                $row['amount_refund_id']  = $sale->projectSaleDetail->amount_refund ?? " ";
                $row['amount_due_id']  = $sale->projectSaleDetail->amount_due ?? " ";
                $row['bidder_id']  = $sale->projectSaleAgentDetailForTeam->bidder->name ?? "" ;
                $row['closer_id']  = $sale->projectSaleAgentDetailForTeam->closer->name ?? "";
                $row['callerl_id']  = $sale->projectSaleAgentDetailForTeam->caller->name ?? "";
                $row['team_id']  = $sale->projectSaleAgentDetailForTeam->team->name  ?? "";
                $row['status']  = $sale->is_active == 1 ? "Complete" : "In Progress";
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
