<?php

namespace App\Http\Controllers\Api\v1\Quality;

use App\Http\Controllers\Controller;
use App\Services\Client\ClientService;
use App\Services\User\UserService;
use App\Services\WorkAssignment\WorkAssignmentService;
use App\Services\WorkAssignmentAssignedQc\WorkAssignmentAssignedQcService;
use App\Services\WorkAssignmentError\WorkAssignmentErrorService;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class QualityController extends Controller
{
    public function __construct(public ClientService $client,public WorkAssignmentService $workAssignment, public  UserService $user, public WorkAssignmentAssignedQcService $workAssignmentAssignedQc, public WorkAssignmentErrorService $workAssignmentError)
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $filteredWorkAssignment = [];
        $clients = $this->client->all()->pluck('name','id');
        $workAssignment = $this->workAssignment->clientWise(ListViewData::fromRequest($request),$request->all());
        $workAssignment = $workAssignment->transform(function($item,$key) use(&$filteredWorkAssignment){

            $filteredWorkAssignment[$item->client->name][$item->account->name]['work_assignment'][] = $item;
            //$filteredWorkAssignment[$item->client->name][$item->account->name]['assigned_dos'] += $item->assigned_dos;
            //$filteredWorkAssignment[$item->client->name][$item->account->name]['client'] = $item->client;
            //$filteredWorkAssignment[$item->client->name][$item->account->name]['account'] = $item->account;
            return $filteredWorkAssignment;
        });
        // qc completed->$filteredWorkAssignment['ALTUS']['PP-HOPD-NEC']['work_assignment'][1]['workAssignmentAssignedQc']->sum('dos_assigned')
        // assigned dos count => array_sum(array_column($filteredWorkAssignment['ALTUS']['PP-HOPD-NEC']['work_assignment'],'assigned_dos'))
        //dd($filteredWorkAssignment['ALTUS']['PP-HOPD-NEC']['work_assignment'][1]['workAssignmentAssignedQc']->sum('dos_assigned'));
        //$filteredWorkAssignment['ALTUS']['PP-HOPD-NEC']['work_assignment'][1]['workAssignmentErrors']->where('error_type','ZTE')->sum('error_count')
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project wise quality'], 'data' => $filteredWorkAssignment];
        return response()->json($output, $code);
    }
}
