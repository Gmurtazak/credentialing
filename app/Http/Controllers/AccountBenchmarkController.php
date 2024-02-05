<?php

namespace App\Http\Controllers;

use App\Dto\AccountAndBenchmarkData;
use App\Models\AccountsAndBenchmark;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;

class AccountBenchmarkController extends Controller
{

    /**
     * @param EmailService $email
     */
    public function __construct(public EmailService $email)
    {
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        $apiUrl = 'api/v1/account_benchmark/all';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('accountbenchmark.list',$this->pageData);
    }

    public function save(){
        $apiRequestData = config('app.api_request_data');
        $this->pageData = (array) $apiRequestData;
        $alertMessages = [];
        $alertType = '';
        if(!empty($this->pageData['errors'])){
            $alertType = 'error';
            foreach($this->pageData['errors'] as $error){
                $alertMessages[] = $error;
            }
        }

        if(!empty($this->pageData['messages'])){
            $alertType = 'success';
            foreach($this->pageData['messages'] as $success){
                $alertMessages[] = $success;
            }
        }

        return redirect('accountbenchmark')->with($alertType, $alertMessages[0]);
    }
    public function edit($id){
        $account = AccountsAndBenchmark::find($id);
        return view('accountbenchmark.edit', compact('account'));
        //return view('accountbenchmark.edit',$this->pageData);

    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add(){
        return view('accountbenchmark.add',$this->pageData);
    }

}
