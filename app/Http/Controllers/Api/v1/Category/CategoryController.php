<?php

namespace App\Http\Controllers\Api\v1\Category;

use App\Dto\CategoryData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Http\Requests\Category\GetCategoryDetailRequest;
use App\Services\Category\CategoryService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class CategoryController extends Controller
{
    public function __construct(public CategoryService $category, public EmailService $email)
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
        $allCategories = $this->category->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All categories'], 'data' => $allCategories];
        return response()->json($output, $code);
    }

    /**
     * @param AddCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddCategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->category->create(CategoryData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Category added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditCategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditCategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $category = $this->category->find((int) $request->get('id'));
        if($category !== NULL){
            $categoryData = CategoryData::fromModel($category)->toRequest($request);
            $this->category->update($categoryData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Category data updated successfully.'],'data'=>$categoryData];
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
        $allUsers = $this->category->datatable(ListViewData::fromRequest($request));
        return response()->json($allUsers, $code);
    }

    /**
     * @param GetCategoryDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetCategoryDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $category   = $this->category->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Category Detail'], 'data' => $category];
        return response()->json($output, $code);
    }
}
