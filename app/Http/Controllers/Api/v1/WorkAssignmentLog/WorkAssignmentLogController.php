<?php

namespace App\Http\Controllers\Api\v1\WorkAssignmentLog;

use App\Dto\WorkAssignmentData;
use App\Dto\WorkAssignmentLogData;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkAssignmentLog\AddWorkAssignmentLogRequest;
use App\Http\Requests\WorkAssignmentLog\GetWorkAssignmentLogDetailRequest;
use App\Services\WorkAssignment\WorkAssignmentService;
use App\Services\WorkAssignmentLog\WorkAssignmentLogService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class WorkAssignmentLogController extends Controller
{
    public function __construct(public WorkAssignmentService $workAssignment, public WorkAssignmentLogService $workAssignmentLog, public EmailService $email)
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
        $allWorkAssignmentLogs = $this->workAssignmentLog->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Work Assignment Log'], 'data' => $allWorkAssignmentLogs];
        return response()->json($output, $code);
    }

    /**
     * @param AddWorkAssignmentLogRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(AddWorkAssignmentLogRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $workAssignment = $this->workAssignment->find($request->work_assignment_id);
        $workAssignmentData = WorkAssignmentData::fromModel($workAssignment);
        $this->workAssignment->update($workAssignmentData);
        $this->workAssignmentLog->create(WorkAssignmentLogData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignment Log added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect(route('workassignmentsubmit'))->with('success', $output['messages'][0]);
        } else{
            return response()->json($output, $code);
        }

    }

    /**
     * @param GetWorkAssignmentLogDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetailByWorkAssignmentId(GetWorkAssignmentLogDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $team   = $this->workAssignmentLog->findAllByAttribute('work_assignment_id',$request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignment Logs Detail'], 'data' => $team];
        return response()->json($output, $code);
    }

}
