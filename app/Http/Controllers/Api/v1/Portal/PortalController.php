<?php

namespace App\Http\Controllers\Api\v1\Portal;

use App\Dto\PortalData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Portal\AddPortalRequest;
use App\Http\Requests\Portal\EditPortalRequest;
use App\Http\Requests\Portal\GetPortalDetailRequest;
use App\Services\Portal\PortalService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


/**
 *
 */
class PortalController extends Controller
{
    /**
     * @param PortalService $portal
     * @param EmailService $email
     */
    public function __construct(public PortalService $portal, public EmailService $email)
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
        $allPortals = $this->portal->datatable(ListViewData::fromRequest($request));
        $allPortals->map(function ($item, $key) {
           $item->totalportal = $this->portal->getportalproject($item->id);
            return $item;
        });
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All portal'], 'data' => $allPortals];
        return response()->json($output, $code);
    }
    public function getportalsale(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allPortals = $this->portal->GetPortalBySale();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All portal'], 'data' => $allPortals];
        return response()->json($output, $code);
    }

    /**
     * @param AddPortalRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddPortalRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
            if($request->phone){
            $request->merge([
                "phone" => implode(" | ", $request->phone)
           ]);
        }
        $this->portal->create(PortalData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Insurance added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect('portal')->with('success', 'Insurance added successfully.');
        } else{
            return response()->json($output, $code);
        }
    }

    /**
     * @param EditPortalRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditPortalRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $portal = $this->portal->find((int) $request->get('id'));
        if($portal !== NULL){
            $portalData = PortalData::fromModel($portal)->toRequest($request);
            $this->portal->update($portalData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Portal data updated successfully.'],'data'=>$portalData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Portal not found.'],'data'=>null];
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
        $allPortal = $this->portal->datatable(ListViewData::fromRequest($request));
        return response()->json($allPortal, $code);
    }

    /**
     * @param GetPortalDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetPortalDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $portal   = $this->portal->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Portal Detail'], 'data' => $portal];
        return response()->json($output, $code);
    }
}
