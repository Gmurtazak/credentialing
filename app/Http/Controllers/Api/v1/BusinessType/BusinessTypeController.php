<?php

namespace App\Http\Controllers\Api\v1\BusinessType;

use App\Dto\BusinessTypeData;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessType\AddBusinessTypeRequest;
use App\Http\Requests\BusinessType\EditBusinessTypeRequest;
use App\Http\Requests\BusinessType\GetBusinessTypeDetailRequest;
use App\Services\BusinessType\BusinessTypeService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class BusinessTypeController extends Controller
{
    public function __construct(public BusinessTypeService $businessType, public EmailService $email)
    {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allBusinessTypes = $this->businessType->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All business types'], 'data' => $allBusinessTypes];
        return response()->json($output, $code);
    }

    /**
     * @param AddBusinessTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddBusinessTypeRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->businessType->create(BusinessTypeData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Business Type added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditBusinessTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditBusinessTypeRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $businessType = $this->businessType->find((int) $request->get('id'));
        if($businessType !== NULL){
            $businessTypeData = BusinessTypeData::fromModel($businessType)->toRequest($request);
            $this->businessType->update($businessTypeData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Business Type data updated successfully.'],'data'=>$businessTypeData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Business Type not found.'],'data'=>null];
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
        $allBusinessTypes = $this->businessType->datatable(ListViewData::fromRequest($request));
        return response()->json($allBusinessTypes, $code);
    }

    /**
     * @param GetBusinessTypeDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetBusinessTypeDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $businessType   = $this->businessType->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Business Type Detail'], 'data' => $businessType];
        return response()->json($output, $code);
    }
}
