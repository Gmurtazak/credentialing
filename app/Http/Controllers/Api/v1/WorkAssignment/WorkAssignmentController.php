<?php

namespace App\Http\Controllers\Api\v1\WorkAssignment;

use App\Dto\WorkAssignmentData;
use App\Dto\WorkAssignmentTempData;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkAssignment\UpdateWorkAssignmentRequest;
use App\Services\WorkAssignment\WorkAssignmentService;
use App\Services\WorkAssignmentTemp\WorkAssignmentTempService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class WorkAssignmentController extends Controller
{
    public function __construct(public WorkAssignmentService $workAssignment, public WorkAssignmentTempService $workAssignmentTemp, public EmailService $email)
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
        $allWorkAssignment = $this->workAssignment->datatable(ListViewData::fromRequest($request),null);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Assigned Work Assignment'], 'data' => $allWorkAssignment];
        return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function allSubmitted(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allWorkAssignment = $this->workAssignment->datatableSubmitted(ListViewData::fromRequest($request),1);
        $allWorkAssignment->map(function ($item, $key) {
            if(count($item->workAssignmentAssignedQc)>0){
                $item->is_assigned = 1;
            } else{
                $item->is_assigned = 0;
            }

            if(count($item->workAssignmentErrors)>0){
                $item->is_error = 1;
            } else{
                $item->is_error = 0;
            }

            return $item;
        });
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Submitted Work Assignment'], 'data' => $allWorkAssignment];
        return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tempSubmit(Request $request)
    {
        $code = 200;
        $ids = explode(',', $request->get('ids'));
        if ($ids) {
            foreach ($ids as $id) {
                $workAssignmentTemp = $this->workAssignmentTemp->getById($id);
                if ($workAssignmentTemp !== NULL) {
                    $workAssignmentTempData = WorkAssignmentTempData::fromModel($workAssignmentTemp);
                    $workAssignmentID = $this->workAssignment->create(WorkAssignmentData::fromArray($workAssignmentTempData));
                    $workAssignmentTempData->setRefWaId($workAssignmentID->id);
                    $this->workAssignmentTemp->update($workAssignmentTempData);
                }
            }
        }
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignments Assigned Successfully'], 'data' => NULL];
        return response()->json($output, $code);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $workAssignment   = $this->workAssignment->findWithLogs((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignments Detail'], 'data' => $workAssignment];
        return response()->json($output, $code);
    }

    public function update(UpdateWorkAssignmentRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $workAssignment = $this->workAssignment->find($request->work_assignment_id);
        $workAssignmentData = WorkAssignmentData::fromModel($workAssignment)->toRequestUpdate($request);
        $this->workAssignment->update($workAssignmentData);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Work Assignment updated successfully.'],'data'=>null];
        if($request->isForm){
            return redirect('assignedassignmentteam')->with('success', 'Work Assignment updated successfully.');
        } else{
            return response()->json($output, $code);
        }
    }
}
