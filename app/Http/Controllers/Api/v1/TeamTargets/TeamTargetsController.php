<?php

namespace App\Http\Controllers\Api\v1\TeamTargets;

use App\Dto\TeamTargetsData;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamTargets\AddTeamTargetsRequest;
use App\Http\Requests\TeamTargets\EditTeamTargetsRequest;
use App\Http\Requests\TeamTargets\GetTeamTargetsDetailRequest;
use App\Models\TeamTargets;
use App\Services\TeamTargets\TeamTargetsService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class TeamTargetsController extends Controller
{
    public function __construct(public TeamTargetsService $teamtargets, public EmailService $email)
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
        $allTeamtargets = $this->teamtargets->datatable(ListViewData::fromRequest($request));
        $allTeamtargets->map(function ($item, $key) {
            $item->totalTarget = $this->teamtargets->getteamproject($item->team_id);
            return $item;
        });

       $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Teams targets'], 'data' => $allTeamtargets];
        return response()->json($output, $code);
    }

    public function allmonthyteamtarget() : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allmonthyteamtarget = $this->teamtargets->GetAllTeamTarget();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Monthly Team Target'], 'data' => $allmonthyteamtarget];
        return response()->json($output, $code);
    }
    public function sortmonthyteamtarget(Request $request) : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allmonthyteamtarget = $this->teamtargets->GetSortTeamTarget($request->months);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Monthly Team Target'], 'data' => $allmonthyteamtarget];
        return response()->json($output, $code);
    }
    public function sortmonthyteam(Request $request) : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $sortmonthyteamtarget = $this->teamtargets->GetAllSortTeamTarget($request->months);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Sort Monthly Teams targets'], 'data' => $sortmonthyteamtarget];
        return response()->json($output, $code);
    }
    public function allyeartarge() : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allmonthyteamtarget = $this->teamtargets->GetAllYearTarget();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Year Team Target'], 'data' => $allmonthyteamtarget];
        return response()->json($output, $code);
    }
    /**
     * @param AddTeamTargetsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddTeamTargetsRequest $request): \Illuminate\Http\JsonResponse
    {
        //dd($request);

        $code = 200;
        $this->teamtargets->create(TeamTargetsData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Team Targets added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditTeamTargetsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditTeamTargetsRequest $request)//: \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $teamtargets = $this->teamtargets->find((int) $request->get('id'));
        //dd($teamtargets);
        if($teamtargets !== NULL){
            $teamtargets = TeamTargetsData::fromModel($teamtargets)->toRequest($request);
            $this->teamtargets->update($teamtargets);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Team Target data updated successfully.'],'data'=>$teamtargets];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Team Target not found.'],'data'=>null];
        }
        if($request->isForm){
            return redirect('teamtargets')->with('success', 'Team Target data updated successfully.');
        } else{
            return response()->json($output, $code);
        }
        //return redirect('rolesrights')->with('success', 'Team Target data updated successfully.');
        //return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allUsers = $this->teamtargets->datatable(ListViewData::fromRequest($request));
        return response()->json($allUsers, $code);
    }

    /**
     * @param GetTeamTargetsDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetTeamTargetsDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $teamtargets   = $this->teamtargets->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Team Target Detail'], 'data' => $teamtargets];
        return response()->json($output, $code);
    }
}
