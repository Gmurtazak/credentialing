<?php

namespace App\Http\Controllers\Api\v1\WorkAssignmentTemp;

use App\Dto\FileData;
use App\Dto\WorkAssignmentTempData;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkAssignmentTemp\AddWorkAssignmentTempRequest;
use App\Services\File\FileService;
use App\Services\WorkAssignmentTemp\WorkAssignmentTempService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class WorkAssignmentTempController extends Controller
{
    public function __construct(public WorkAssignmentTempService $workAssignmentTemp, public EmailService $email,public FileService $file)
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allWorkAssignment = $this->workAssignmentTemp->all();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Work Assignment Temp'], 'data' => $allWorkAssignment];
        return response()->json($output, $code);
    }

    public function add(AddWorkAssignmentTempRequest $request): \Illuminate\Http\JsonResponse
    {
        if($request->file_id == null){
            $fileData = FileData::fromWorkAssignmentRequest($request);
            $request->merge([
                'file_id' => $this->file->create($fileData)->id,
            ]);
        }
        $code = 200;
        $this->workAssignmentTemp->create(WorkAssignmentTempData::fromRequest($request));
        $allWorkAssignment = $this->workAssignmentTemp->all();
        $userFiltered = $allWorkAssignment->filter(function ($value, $key) use($allWorkAssignment) {
            if(getDateFormat($value->assigned_date,'Y-m-d') == date('Y-m-d') && $value->assigned_to == $allWorkAssignment[0]->assigned_to){
                return $value;
            } else{
                return $value;
            }
        });
        $msg = "Work Assignment Temp added successfully.<br/>You have added total ".$userFiltered->sum('hours').' hours for User '.$userFiltered->first()->assignedTo->name.' for date '.date('d M, Y');
        $output = ['status' => 'success', 'code' => $code, 'messages' => [$msg],'data'=>$allWorkAssignment];
        return response()->json($output, $code);
    }

    /**
     * @param EditTeamRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditTeamRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $team = $this->team->find((int) $request->get('id'));
        if($team !== NULL){
            $teamData = TeamData::fromModel($team)->toRequest($request);
            $this->team->update($teamData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Team data updated successfully.'],'data'=>$teamData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Team not found.'],'data'=>null];
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
        $allUsers = $this->team->datatable(ListViewData::fromRequest($request));
        return response()->json($allUsers, $code);
    }

    /**
     * @param GetTeamDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetTeamDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $team   = $this->team->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Team Detail'], 'data' => $team];
        return response()->json($output, $code);
    }
}
