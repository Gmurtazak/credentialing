<?php

namespace App\Http\Controllers\Api\v1\Role;

use App\Dto\RoleData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\AddRoleRequest;
use App\Http\Requests\Role\EditRoleRequest;
use App\Http\Requests\Role\GetRoleDetailRequest;
use App\Models\Role;
use App\Models\RolesRight;
use App\Services\Role\RoleService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


/**
 * Class RoleController
 * @package App\Http\Controllers\Api\v1\Admin
 */
class RoleController extends Controller
{
    public function __construct(public RoleService $role, public EmailService $email)
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
        $allRoles = $this->role->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All roles'], 'data' => $allRoles];
        return response()->json($output, $code);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *  @return Illuminate\Http\RedirectResponse
     */
    public function addRoleRigts(Request $request)//: \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        // return $request->all();
        $code = 200;
        RolesRight::truncate();
        foreach ($request->role_id as $role_key => $value) {
            foreach ($request->role_id[$role_key] as $key => $value) {
            $roleRights = new RolesRight();
            $roleRights->role_id = $role_key;
            $roleRights->right_id = $value;
            $roleRights->save();
            }
        }

        return redirect('rolesrights')->with('success', 'All roles and right insert');
    }

    /**
     * @param AddRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddRoleRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->role->create(RoleData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Role added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param EditRoleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditRoleRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $role = $this->role->find((int) $request->get('id'));
        if($role !== NULL){
            $roleData = RoleData::fromModel($role)->toRequest($request);
            $this->role->update($roleData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Role data updated successfully.'],'data'=>$roleData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Role not found.'],'data'=>null];
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
        $allRoles = $this->role->datatable(ListViewData::fromRequest($request));
        return response()->json($allRoles, $code);
    }

    /**
     * @param GetRoleDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetRoleDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $role   = $this->role->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Role Detail'], 'data' => $role];
        return response()->json($output, $code);
    }


    public function getAll(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allRoles = $this->role->getAll(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All roles with rights'], 'data' => $allRoles];
        return response()->json($output, $code);
    }
}
