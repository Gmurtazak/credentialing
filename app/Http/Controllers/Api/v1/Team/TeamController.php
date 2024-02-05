<?php

namespace App\Http\Controllers\Api\v1\Team;

use App\Dto\TeamData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Team\AddTeamRequest;
use App\Http\Requests\Team\EditTeamRequest;
use App\Http\Requests\Team\GetTeamDetailRequest;
use App\Services\Team\TeamService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class TeamController extends Controller
{
    public function __construct(public TeamService $team, public EmailService $email)
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
        $allTeams = $this->team->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Teams'], 'data' => $allTeams];
        return response()->json($output, $code);
    }

    /**
     * @param AddTeamRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddTeamRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->team->create(TeamData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Clinic added successfully.'],'data'=>null];
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
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Clinic data updated successfully.'],'data'=>$teamData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Clinic not found.'],'data'=>null];
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
        $team["target"]   = $this->target = TeamService::getAllroletarget($request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Team Detail'], 'data' => $team];
        return response()->json($output, $code);
    }
}
