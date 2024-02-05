<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamTargetsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apiUrl = 'api/v1/teamtargets/all';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('teamtargets.list',$this->pageData);
    }
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(): \Illuminate\Http\RedirectResponse
    {

        $apiRequestData = config('app.api_request_data');
        $this->pageData = (array) $apiRequestData;
        //dd($apiRequestData);
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

        return redirect()->back()->with($alertType, $alertMessages[0]);
    }
}
