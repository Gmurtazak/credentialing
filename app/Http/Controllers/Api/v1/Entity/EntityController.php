<?php

namespace App\Http\Controllers\Api\v1\Entity;

use App\Dto\EntityData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Entity\AddEntityRequest;
use App\Http\Requests\Entity\EditEntityRequest;
use App\Http\Requests\Entity\GetEntityDetailRequest;
use App\Services\Entity\EntityService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class EntityController extends Controller
{
    public function __construct(public EntityService $entity, public EmailService $email)
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
        $allEntities = $this->entity->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All entities'], 'data' => $allEntities];
        return response()->json($output, $code);
    }

    /**
     * @param AddEntityRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddEntityRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->entity->create(EntityData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Entity added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditEntityRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditEntityRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $entity = $this->entity->find((int) $request->get('id'));
        if($entity !== NULL){
            $entityData = EntityData::fromModel($entity)->toRequest($request);
            $this->entity->update($entityData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Entity data updated successfully.'],'data'=>$entityData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Entity not found.'],'data'=>null];
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
        $allEntities = $this->entity->datatable(ListViewData::fromRequest($request));
        return response()->json($allEntities, $code);
    }

    /**
     * @param GetEntityDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetEntityDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $entity   = $this->entity->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Entity Detail'], 'data' => $entity];
        return response()->json($output, $code);
    }
}
