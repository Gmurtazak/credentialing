<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReversehitsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('reversehits.list',$this->pageData);
    }

    public function getByEmpCode(Request $request){
        //dd($request);
        $apiUrl = 'api/v1/productivity/byUserId';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        //$request['userId'] = \Auth::user()->id;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('reversehits.list',$this->pageData);
    }

}
