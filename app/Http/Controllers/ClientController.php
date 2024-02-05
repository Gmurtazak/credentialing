<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *
 */
class ClientController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apiUrl = 'api/v1/client/all';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('client.list',$this->pageData);
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
        return redirect()->back()->withInput($request->input())->with('success', 'Provider added successfully.');
        //return redirect()->back()->with($alertType, $alertMessages[0]);
    }


    /**
     * @param Request $request
     * @return void
     */
    public function autoComplete(Request $request)
    {
        $response = [];
        $query = \DB::table('clients');
        $query->offset(0);
        $query->limit(5);
        $query->where('name','like',"%$request->term%");
        $data = $query->get();
        foreach ($data as $ind=>$row)
        {
            $response[$ind]['value'] = $row->id;
            $response[$ind]['label'] = $row->name;
            $response[$ind]['country'] = $row->country;
        }
        echo json_encode($response);
    }

    /**
     * @param $id
     * @return void
     */
    public function getClient($id)
    {

        $response = [];
        $query = \DB::table('clients');
        $query->offset(0);
        $query->limit(5);
        $query->where('id','like',"%$id");
        $data = $query->get();
        $userData['data'] = $data;

        echo json_encode($userData);
    }
    public function view($id){

        $query = \DB::table('provider');
        $query->offset(0);
        $query->limit(8);
        $query->where('clinicid',"$id");
        $data = $query->get();
        $userData['data'] = $data;
        /*$apiUrl = 'api/v1/client/detail';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'POST',['id'=>$id], $headers);
        $result = json_decode($result);*/
        $this->pageData['data'] = $userData;
            //$this->pageData['users'] = $result->data;
            //$this->pageData['useraccout'] = $result->useraccout;
            //dd($this->pageData['useraccout']);
            return view('client.list',$this->pageData);

    }
    public function views($id){

        $query = \DB::table('provider');
        $query->offset(0);
        $query->limit(8);
        $query->where('clinicid',"$id");
        $data = $query->get();
        $userData['data'] = $data;
        /*$apiUrl = 'api/v1/client/detail';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'POST',['id'=>$id], $headers);
        $result = json_decode($result);*/
        $this->pageData['data'] = $userData;
        //$this->pageData['users'] = $result->data;
        //$this->pageData['useraccout'] = $result->useraccout;
        //dd($this->pageData['useraccout']);
        //return view('client.list',$this->pageData);
        return $this->pageData;

    }
}
