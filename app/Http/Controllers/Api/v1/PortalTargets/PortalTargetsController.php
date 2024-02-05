<?php

namespace App\Http\Controllers\Api\v1\PortalTargets;

use App\Dto\PortalTargetsData;
use App\Http\Controllers\Controller;
use App\Http\Requests\PortalTargets\AddPortalTargetsRequest;
use App\Http\Requests\PortalTargets\EditPortalTargetsRequest;
use App\Http\Requests\PortalTargets\GetPortalTargetsDetailRequest;
use App\Models\PortalTargets;
use App\Services\PortalTargets\PortalTargetsService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class PortalTargetsController extends Controller
{
    public function __construct(public PortalTargetsService $portaltarget, public EmailService $email)
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
        $allPortalTargets = $this->portaltarget->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Teams'], 'data' => $allPortalTargets];
        return response()->json($output, $code);
    }

    /**
     * @param AddPortalTargetsRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddPortalTargetsRequest $request): \Illuminate\Http\JsonResponse
    {
        $portaltargetyear =  $request->get('year');
//        dd($portaltargetyear);
        $checkportaltargetyear = PortalTargets::where('year',$portaltargetyear)->first();
        if ($checkportaltargetyear){
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Portal Targets Already This Year.'],'data'=>null];

        }
        else{
            $code = 200;
            $this->portaltarget->create(PortalTargetsData::fromRequest($request));
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Portal Targets added successfully.'],'data'=>null];

        }
        return response()->json($output, $code);
    }

    /**
     * @param EditTeamRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditPortalTargetsRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $portaltarget = $this->portaltarget->find((int) $request->get('id'));
        if($portaltarget !== NULL){
            $portaltarget = PortalTargetsData::fromModel($portaltarget)->toRequest($request);
            $this->portaltarget->update($portaltarget);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Portal Targets updated successfully.'],'data'=>$portaltarget];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Portal Targets not found.'],'data'=>null];
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
    public function getDetail(GetPortalTargetsDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $portaltarget   = $this->portaltarget->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Portal Target Detail'], 'data' => $portaltarget];
        return response()->json($output, $code);
    }
}
