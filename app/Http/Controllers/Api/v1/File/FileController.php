<?php

namespace App\Http\Controllers\Api\v1\File;

use App\Dto\FileData;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\AddFileRequest;
use App\Http\Requests\File\EditFileRequest;
use App\Http\Requests\File\GetFileDetailRequest;
use App\Services\File\FileService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class FileController extends Controller
{
    public function __construct(public FileService $file, public EmailService $email)
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
        $allFiles = $this->file->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All files'], 'data' => $allFiles];
        return response()->json($output, $code);
    }

    /**
     * @param AddFileRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddFileRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->file->create(FileData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['File added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditFileRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditFileRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $file = $this->file->find((int) $request->get('id'));
        if($file !== NULL){
            $fileData = FileData::fromModel($file)->toRequest($request);
            $this->file->update($fileData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['File data updated successfully.'],'data'=>$fileData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['File not found.'],'data'=>null];
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
        $allFiles = $this->file->datatable(ListViewData::fromRequest($request));
        return response()->json($allFiles, $code);
    }

    /**
     * @param GetFileDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetFileDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $file   = $this->file->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['File Detail'], 'data' => $file];
        return response()->json($output, $code);
    }
}
