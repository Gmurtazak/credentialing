<?php

namespace App\Http\Controllers\Api\v1\Insurance;

use App\Dto\InsuranceData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Insurance\AddInsuranceRequest;
use App\Http\Requests\Insurance\EditInsuranceRequest;
use App\Http\Requests\Insurance\GetInsuranceDetailRequest;
use App\Services\Insurance\InsuranceService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class InsuranceController extends Controller
{
    public function __construct(public InsuranceService $insurance, public EmailService $email)
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
        $allInsurances = $this->insurance->datatable(ListViewData::fromRequest($request));
        $filePath = 'insurance/';
        $allInsurances->setCollection(
            $allInsurances->getCollection()->transform(function ($item, $key) use($filePath){
                $item->logo = \Storage::url($filePath . $item->logo);
                return $item;
            })
        );
        //dd($allInsurances);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All insurance'], 'data' => $allInsurances];
        return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        if($request->remarks){
            $request->merge([
                "remarks" => implode(" | ", $request->remarks)
            ]);
        }
        if($request->remarksdate){
            $request->merge([
                "remarksdate" => implode(" | ", $request->remarksdate)
            ]);
        }
        $this->insurance->create(InsuranceData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Credentialing added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect()->back()->withInput($request->input())->with('success', 'Credentialing added successfully.');
            //return redirect('portal/',$request->provider)->with('success', 'Credentialing added successfully.');
        } else{
            return response()->json($output, $code);
        }
    }


    /**
     * @param EditInsuranceRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditInsuranceRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $insurance = $this->insurance->find((int) $request->get('id'));
        if($insurance !== NULL){
            if($request->remarks){
                $request->merge([
                    "remarks" => implode(" <br/> ", $request->remarks)
                ]);
            }
            if($request->remarksdate){
                $request->merge([
                    "remarksdate" => implode(" | ", $request->remarksdate)
                ]);
            }
            $insuranceData = InsuranceData::fromModel($insurance)->toRequest($request);
            $this->insurance->update($insuranceData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Credentialing data updated successfully.'],'data'=>$insuranceData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Credentialing not found.'],'data'=>null];
        }

        if($request->isForm){
            return redirect()->back()->withInput($request->input())->with('success', 'Credentialing updated successfully.');
            //return redirect('insurance')->with('success', 'Credentialing updated successfully.');
        } else{
            return response()->json($output, $code);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allFiles = $this->insurance->datatable(ListViewData::fromRequest($request));
        return response()->json($allFiles, $code);
    }

    /**
     * @param GetInsuranceDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetInsuranceDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $insurance   = $this->insurance->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Insurance Detail'], 'data' => $insurance];
        return response()->json($output, $code);
    }
}
