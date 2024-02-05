<?php

namespace App\Http\Controllers\Api\v1\ProjectSaleDetail;

use App\Dto\ProjectSaleDetailData;
use App\Http\Controllers\Controller;
use App\Services\ProjectSaleDetail\ProjectSaleDetailService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


/**
 *
 */
class ProjectSaleDetailController extends Controller
{
    /**
     * @param ProjectSaleDetailService $projectSaleDetail
     * @param EmailService $email
     */
    public function __construct(public ProjectSaleDetailService $projectSaleDetail, public EmailService $email)
    {
    }

//    public function all(Request $request): \Illuminate\Http\JsonResponse
//    {
//        $code = 200;
//        $allProjectSales = $this->projectSale->datatable(ListViewData::fromRequest($request));
//        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All project sales'], 'data' => $allProjectSales];
//        return response()->json($output, $code);
//    }

    /**
     * @param AddProjectSaleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(AddProjectSaleRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->projectSale->create(ProjectSaleData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Sale added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditProjectSaleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EditProjectSaleRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $projectSale = $this->projectSale->find((int) $request->get('id'));
        if($projectSale !== NULL){
            $projectSaleData = ProjectSaleData::fromModel($projectSale)->toRequest($request);
            $this->projectSale->update($projectSaleData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Sale data updated successfully.'],'data'=>$projectSaleData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Project Sale not found.'],'data'=>null];
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
        $allProjectSale = $this->projectSale->datatable(ListViewData::fromRequest($request));
        return response()->json($allProjectSale, $code);
    }

    /**
     * @param GetProjectSaleDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetProjectSaleDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $projectSale   = $this->projectSale->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Project Sale Detail'], 'data' => $projectSale];
        return response()->json($output, $code);
    }
}
