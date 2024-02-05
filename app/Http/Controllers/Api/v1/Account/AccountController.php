<?php

namespace App\Http\Controllers\Api\v1\Account;

use App\Dto\AccountData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\AddAccountRequest;
use App\Http\Requests\Account\EditAccountRequest;
use App\Http\Requests\Account\GetAccountDetailRequest;
use App\Services\Account\AccountService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class AccountController extends Controller
{
    public function __construct(public AccountService $account, public EmailService $email)
    {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allAccount = $this->account->datatable(ListViewData::fromRequest($request));
        $allAccount->map(function ($item, $key) {
            $item->totalAccount = $this->account->GetAccountProject($item->id);
            return $item;
        });
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All accounts'], 'data' => $allAccount];
        return response()->json($output, $code);
    }
    public function getaccountsale(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;

        $allAccount = $this->account->GetAccountBySale();
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All accounts'], 'data' => $allAccount];
        return response()->json($output, $code);
    }

    public function add(AddAccountRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->account->create(AccountData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Account added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    public function update(EditAccountRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $account = $this->account->find((int) $request->get('id'));
        if($account !== NULL){
            $accountData = AccountData::fromModel($account)->toRequest($request);
            $this->account->update($accountData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Account data updated successfully.'],'data'=>$accountData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Account not found.'],'data'=>null];
        }
        if($request->isForm){
            return redirect('account')->with($output['status'], $output['messages'][0]);
        } else{
            return response()->json($output, $code);
        }

    }

    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allAccount= $this->account->datatable(ListViewData::fromRequest($request));
        return response()->json($allAccount, $code);
    }

    public function getDetail(GetAccountDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $account   = $this->account->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Account Detail'], 'data' => $account];
        return response()->json($output, $code);
    }
}
