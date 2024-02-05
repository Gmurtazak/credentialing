<?php

namespace App\Http\Controllers;

use App\Dto\UserData;
use App\Models\User;
use App\Services\EmailService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * UserTypeController constructor.
     * @param UserService $user
     */

    public function __construct(public UserService $user, public EmailService $email)
    {
    }
    public function verifyUser($key){
        $user = $this->user->find(base64_decode($key));
        return view('auth.verify',['user'=>$user]);
//        if($user !== NULL){
//            $userData = UserData::fromModel($user);
//            $userData->setEmailVerifiedAt(now());
//            $userData->setIsActive(TRUE);
//            $this->user->update($userData);
//            echo 'Done';
//        } else{
//            echo 'Error';
//        }
    }

    public function activateUser(Request $request){
        $code = 200;
        $user = $this->user->find((int) $request->get('id'));
        if($user !== NULL){
            $userData = UserData::fromModel($user)->toRequest($request);
            $this->user->update($userData);
            return redirect("login")->with('message', 'Success! You can now login with your credentials.');
        } else{
            return redirect("login")->with('message', 'Ops! something went wrong.');
        }
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request){
        $apiUrl = 'api/v1/user/all';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'GET',$request->all(), $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        $this->pageData['request']=$request->all();
        return view('user.list',$this->pageData);
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

        return redirect()->back()->with($alertType, @$alertMessages[0]);
    }
    public function edit($id){
        $apiUrl = 'api/v1/user/detail';
        $headers = [];
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$apiUrl;
        $result = call_api_using_curl($api_end_point,'POST',['id'=>$id], $headers);
        $result = json_decode($result);
        $this->pageData['data'] = $result;
        if($this->pageData['data']->code==200){
            $this->pageData['users'] = $result->data;
            $this->pageData['useraccout'] = $result->useraccout;
           //dd($this->pageData['useraccout']);
            return view('user.edit',$this->pageData);
        } else{
            return redirect("user")->with('error', 'No User found.');
        }



    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add(){
        return view('user.add_user',$this->pageData);
    }

}
