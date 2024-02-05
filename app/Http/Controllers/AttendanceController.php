<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
       // $apiUrl = 'api/v1/user_attendance/all';
        //$headers = [];
       // $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        //$result = call_api_using_curl($api_end_point,'GET', $request->all(), $headers);
        //$result = json_decode($result);
        //$this->pageData['data'] = $result;
        //$this->pageData['request']=$request->all();
        return view('userattendance.list',$this->pageData);
    }
    public function getByEmpCode(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apiUrl = 'api/v1/user_attendance/getByEmpCode';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        //dd($this->pageData);
        return view('userattendance.list',$this->pageData);
    }
    public function add(Request $request)
    {
        return view('userattendance.add',$this->pageData);
    }
}
