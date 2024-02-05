<?php

namespace App\Http\Controllers;


use App\Dto\FileData;
use App\Dto\WorkAssignment;
use App\Models\WorkAssignmentsTemp;
use App\Models\WorkAssignmentError;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ListworkassignedController extends Controller
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
        return view('listworkassigned.list',$this->pageData);
    }

    public function indexs($id){
        $apiUrl = 'api/v1/work_assignment_error/getbyworkassignment';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',['work_assignment_id'=>$id], $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['assignmenterror'] = $result->data;
        return view('listworkassigned.list1',$this->pageData);
    }

    public function viewerror(Request $request){
        $apiUrl = 'api/v1/work_assignment_error/all';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $request['userId'] = \Auth::user()->id;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('listworkassigned.viewerror',$this->pageData);
    }
    public function edit($id){
        $apiUrl = 'api/v1/work_assignment_error/getbyworkassignment';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',['work_assignment_id'=>$id], $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['assignmenterror'] = $result->data;
        return view('listworkassigned.edit',$this->pageData);
       // dd($this->pageData['assignmenterror']);
       // if($this->pageData['data']->code==200){
        //    $this->pageData['assignmenterror'] = $result->data;
        //    return view('listworkassigned.edit',$this->pageData);
        //} else{
         //   return redirect("listworkassigned.list")->with('error', 'No User found.');
       // }
        //$work_assignment_id = WorkAssignmentError::find($id);
       //// return view('listworkassigned.edit',$work_assignment_id );
        //return view('accountbenchmark.edit',$account);

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
        //dd($request,'a');
        return redirect()->back()->with($alertType, $alertMessages[0]);
    }


    public function add($id)
    {
        $apiUrl = 'api/v1/work_assignment_error/getbyworkassignment';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',['work_assignment_id'=>$id], $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['assignmenterror'] = $result->data;
        return view('listworkassigned.add',$this->pageData);
    }



}
