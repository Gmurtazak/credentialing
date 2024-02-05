<?php

namespace App\Http\Controllers\Api\v1\Client;

use App\Dto\ClientData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AddClientRequest;
use App\Http\Requests\Client\EditClientRequest;
use App\Http\Requests\Client\GetClientDetailRequest;
use App\Services\Client\ClientService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class ClientController extends Controller
{
    public function __construct(public ClientService $client, public EmailService $email)
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
        $allClients = $this->client->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All clients'], 'data' => $allClients];
        return response()->json($output, $code);
    }

    /**
     * @param AddClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddClientRequest $request)//: \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $this->client->create(ClientData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Provider added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect()->back()->withInput($request->input())->with('success', 'Provider added successfully.');
            //return redirect('client')->with('success', 'Provider added successfully.');
        } else{
            return response()->json($output, $code);
        }
        //return response()->json($output, $code);
    }

    /**
     * @param EditClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditClientRequest $request)//: \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $client = $this->client->find((int) $request->get('id'));
        if($client !== NULL){
            $clientData = ClientData::fromModel($client)->toRequest($request);
            $this->client->update($clientData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Provider data updated successfully.'],'data'=>$clientData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Provider not found.'],'data'=>null];
        }
        if($request->isForm){
            return redirect()->back()->withInput($request->input())->with('success', 'Provider data updated successfully.');
           // return redirect('client')->with('success', 'Provider data updated successfully.');
        } else{
            return response()->json($output, $code);
        }
        //return response()->json($output, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allClients = $this->client->datatable(ListViewData::fromRequest($request));
        return response()->json($allClients, $code);
    }


    /**
     * @param GetClientDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetClientDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $client   = $this->client->find((int) $request->get('id'));
        if($client && $client->country !=''){
            $query = \DB::table('countries');
            $query->where('name',$client->country);
            $query->orWhere('iso2',$client->country);
            $client['country'] = $query->first();
        }
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Client Detail'], 'data' => $client];
        return response()->json($output, $code);
    }
}
