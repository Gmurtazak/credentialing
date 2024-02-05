<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;
use Storage;
use Redirect;

class SaleController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apiUrl = 'api/v1/portal/all';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        $view = view('sale.list',$this->pageData);
        //$view->nest('partials.header',$this->pageData);
        return $view;

    }
    public function getFile($filename)//: \Illuminate\Http\RedirectResponse
    {
        $file= public_path(). "/storage/provider/".$filename;
        return (new response($file, 200))
            ->header('Content-Type', 'image/pdf');
    }

    public function saleproject(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apiUrl = 'api/v1/project_sale/all';
        $headers = [];
        $request['userId'] = Auth::id();
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        // dd($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('sale.list1',$this->pageData);
    }
    public function add_sale(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        $this->pageData['data'] = $user;
        return view('sale.add',$this->pageData);
    }
    public function edit_sale($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $apiUrl = 'api/v1/project_sale/detail';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'POST',['id'=>$id], $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        if($this->pageData['data']->code==200){
            $this->pageData['sale'] = $result->data;
            return view('sale.edit',$this->pageData);
        } else{
            return redirect("sale")->with('error', 'No User found.');
        }

    }
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(): \Illuminate\Http\RedirectResponse
    {
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

        return redirect()->back()->with($alertType, $alertMessages[0]);
    }

    public function bidinghistory($id)//: \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $apiUrl = 'api/v1/project_sale_log';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',['id'=>$id], $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        return view('sale.bidinghistory',$this->pageData);

    }
    public function view($id){

        $query = \DB::table('credentialingset');
        $query->offset(0);
        $query->limit(100);
        $query->where('provider','like',"%$id");
        $data = $query->get();
        $querytwo = \DB::table('provider');
        $querytwo->offset(0);
        $querytwo->limit(1);
        $querytwo->where('id','like',"%$id");
        $datatwo = $querytwo->get();
        $userData['data'] = $data;
        $this->pageData['data'] = $userData;
        $userDatatwo['provider'] = $datatwo;
        $this->pageDatatwo['provider'] = $userDatatwo;
        return view('insurance.list',$this->pageData,$this->pageDatatwo);

    }

}
