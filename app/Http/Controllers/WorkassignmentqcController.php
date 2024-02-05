<?php

namespace App\Http\Controllers;


use App\Dto\FileData;
use App\Dto\WorkAssignment;
use App\Models\WorkAssignmentsTemp;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WorkassignmentqcController extends Controller
{
    /**
     * @param EmailService $email
     */
    public function __construct(public EmailService $email)
    {
    }
    public function index(Request $request){
        $apiUrl = 'api/v1/work_assignment/all-submitted';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $request['userId'] = \Auth::user()->id;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('workassignmentqc.list',$this->pageData);
    }

    public function save(Request $request){
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
        return redirect()->back()->withInput($request->input())->with($alertType, @$alertMessages[0]);
    }


    public function add(Request $request)
    {
        $apiUrl = 'api/v1/ad_hoc_assignment/all';
        $headers = [];//["Authtoken:{$accessToken->token}"];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        $this->pageData['user_id'] = auth::user()->id;
        return view('workassignment.add',$this->pageData);
    }


}
