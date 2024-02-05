<?php

namespace App\Http\Controllers\Api\v1\WorkAssignmentAssignedQc;

use App\Dto\WorkAssignmentData;
use App\Dto\WorkAssignmentAssignedQcData;
use App\Http\Controllers\Controller;
use App\Services\WorkAssignment\WorkAssignmentService;
use App\Services\WorkAssignmentAssignedQc\WorkAssignmentAssignedQcService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class WorkAssignmentAssignedQcController extends Controller
{
    public function __construct(public WorkAssignmentService $workAssignment, public WorkAssignmentAssignedQcService $workAssignmentAssignedQc, public EmailService $email)
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
        $allWorkAssignment = $this->workAssignmentAssignedQc->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All QC Assigned Work Assignment'], 'data' => $allWorkAssignment];
        return response()->json($output, $code);
    }

    public function add(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $this->workAssignmentAssignedQc->create(WorkAssignmentAssignedQcData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignment Assigned to QC successfully.'],'data'=>null];
        if($request->isForm){
            return redirect('workassignmentqc')->with('success', 'Work Assignment Assigned to QC successfully.');
        } else{
            return response()->json($output, $code);
        }
    }
}
