<?php

namespace App\Http\Controllers\Api\v1\WorkAssignmentError;

use App\Dto\WorkAssignmentErrorData;
use App\Http\Controllers\Controller;
use App\Services\WorkAssignment\WorkAssignmentService;
use App\Services\EmailService;
use App\Services\WorkAssignmentError\WorkAssignmentErrorService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class WorkAssignmentErrorController extends Controller
{
    public function __construct(public WorkAssignmentService $workAssignment, public WorkAssignmentErrorService $workAssignmentError, public EmailService $email)
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
        $allWorkAssignment = $this->workAssignmentError->datatable(ListViewData::fromRequest($request),null);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Work Assignment Errors'], 'data' => $allWorkAssignment];
        return response()->json($output, $code);
    }

    public function add(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {

        $code = 200;

        $request->merge([
            "error_count" => implode(",", $request->error_count)
        ]);
        $request->merge([
            "error_type" => implode(",", $request->error_type)
        ]);
        $request->merge([
            "mistake" => implode(",", $request->mistake)
        ]);
        $this->workAssignmentError->create(WorkAssignmentErrorData::fromRequest($request));

        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignment Error added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect('listworkassigned')->with('success', 'Work Assignment Error added successfully.');
        } else{
            return response()->json($output, $code);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getbyworkassignment(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $workAssignment = $this->workAssignment->findWithLogs($request->work_assignment_id);
        $workAssignment->dos_complete = 0;
        $workAssignment->dos_hours = 0;
        if($workAssignment->logs){
            $workAssignment->dos_complete = $workAssignment->logs->sum('dos_complete');
            $workAssignment->dos_hours = $workAssignment->logs->sum('hours');
        }
        $workAssignmentErrors = $this->workAssignmentError->findAllByAttribute('work_assignment_id',$request->work_assignment_id);
        $data['workassignment'] = $workAssignment;
        $data['workassignmentError'] = $workAssignmentErrors;
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignment Error detail.'],'data'=>$data];
        return response()->json($output, $code);
    }

}
