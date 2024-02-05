<?php

namespace App\Http\Controllers\Api\v1\ProjectType;

use App\Dto\ProjectTypeData;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectType\AddProjectTypeRequest;
use App\Http\Requests\ProjectType\EditProjectTypeRequest;
use App\Http\Requests\ProjectType\GetProjectTypeDetailRequest;
use App\Services\AccountAndBenchmark\AccountAndBenchmarkService;
use App\Services\ProjectType\ProjectTypeService;
use App\Services\EmailService;
use App\Services\User\UserService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class ProjectTypeController extends Controller
{
    public function __construct(public ProjectTypeService $projectType,  public UserService $user, public EmailService $email)
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
        $allProjectTypes = $this->projectType->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All project types'], 'data' => $allProjectTypes];
        return response()->json($output, $code);
    }

    /**
     * @param AddProjectTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddProjectTypeRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->projectType->create(ProjectTypeData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project type added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllByProjectType(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $accounts = $this->accountAndBenchmark->findAllByAttribute('project_type',$request->project_type);
        $pluckedAccount = $accounts->pluck('name', 'id');
        $data['account'] = $pluckedAccount->all();
        $data['user'] = $this->user->getAllUsersByProjectType($request->project_type);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Account & users data by project type'],'data'=>$data];
        return response()->json($output, $code);
    }

    /**
     * @param EditProjectTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EditProjectTypeRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $projectType = $this->projectType->find((int) $request->get('id'));
        if($projectType !== NULL){
            $projectTypeData = ProjectTypeData::fromModel($projectType)->toRequest($request);
            $this->projectType->update($projectTypeData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project type data updated successfully.'],'data'=>$projectTypeData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Project type not found.'],'data'=>null];
        }
        return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allProjectTypes = $this->projectType->datatable(ListViewData::fromRequest($request));
        return response()->json($allProjectTypes, $code);
    }

    /**
     * @param GetProjectTypeDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetProjectTypeDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $projectType   = $this->projectType->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Type Detail'], 'data' => $projectType];
        return response()->json($output, $code);
    }
}
