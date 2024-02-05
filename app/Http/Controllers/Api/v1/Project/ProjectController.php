<?php

namespace App\Http\Controllers\Api\v1\Project;

use App\Dto\ProjectData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Project\AddProjectRequest;
use App\Http\Requests\Project\EditProjectRequest;
use App\Http\Requests\Project\GetProjectDetailRequest;
use App\Services\Project\ProjectService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class ProjectController extends Controller
{
    public function __construct(public ProjectService $project, public EmailService $email)
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
        $allProjects = $this->project->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All project'], 'data' => $allProjects];
        return response()->json($output, $code);
    }

    /**
     * @param AddProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddProjectRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->project->create(ProjectData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditProjectRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $project = $this->project->find((int) $request->get('id'));
        if($project !== NULL){
            $projectData = ProjectData::fromModel($project)->toRequest($request);
            $this->project->update($projectData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project data updated successfully.'],'data'=>$projectData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Category not found.'],'data'=>null];
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
        $allProjects = $this->project->datatable(ListViewData::fromRequest($request));
        return response()->json($allProjects, $code);
    }

    public function getDetail(GetProjectDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $project   = $this->project->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Detail'], 'data' => $project];
        return response()->json($output, $code);
    }
}
