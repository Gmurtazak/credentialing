<?php

namespace App\Http\Controllers\Api\v1\Department;

use App\Dto\DepartmentData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Department\AddDepartmentRequest;
use App\Http\Requests\Department\EditDepartmentRequest;
use App\Http\Requests\Department\GerDepartmentDetailRequest;
use App\Services\Department\DepartmentService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class DepartmentController extends Controller
{
    public function __construct(public DepartmentService $department, public EmailService $email)
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
        $allDepartments = $this->department->datatable(ListViewData::fromRequest($request));
        $filePath = 'departments/';
        $allDepartments->setCollection(
            $allDepartments->getCollection()->transform(function ($item, $key) use($filePath){
                $item->logo = \Storage::url($filePath . $item->logo);
                return $item;
            })
        );
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All department'], 'data' => $allDepartments];
        return response()->json($output, $code);
    }

    /**
     * @param AddDepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddDepartmentRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $this->department->create(DepartmentData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Department added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect('departments')->with('success', 'Department added successfully.');
        } else{
            return response()->json($output, $code);
        }
    }


    /**
     * @param EditDepartmentRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditDepartmentRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $department = $this->department->find((int) $request->get('id'));
        if($department !== NULL){
            $departmentData = DepartmentData::fromModel($department)->toRequest($request);
            $this->department->update($departmentData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Department data updated successfully.'],'data'=>$departmentData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Department not found.'],'data'=>null];
        }
        if($request->isForm){
            return redirect('departments')->with('success', 'Department updated successfully.');
        } else{
            return response()->json($output, $code);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allUsers = $this->department->datatable(ListViewData::fromRequest($request));
        return response()->json($allUsers, $code);
    }

    public function getDetail(GerDepartmentDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $department   = $this->department->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Department Detail'], 'data' => $department];
        return response()->json($output, $code);
    }
    public function getcurrentbids() : \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $department = $this->department->GetCurrentBids();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Get Current Bids'], 'data' => $department];
        return response()->json($output, $code);
    }
}
