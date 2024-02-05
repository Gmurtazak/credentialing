<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Dto\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\GetUserDetailRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Http\Requests\User\UserRequest;
use App\Services\User\UserService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


/**
 * Class UserTypeController
 * @package App\Http\Controllers\Api\v1\Admin
 */
class UserController extends Controller
{
    /**
     * UserTypeController constructor.
     * @param UserService $user
     */
    public function __construct(public UserService $user, public EmailService $email)
    {
    }

    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $filters = ListViewData::fromRequest($request);
        $ids = [];
//        if(@$filters->filter['type']=='project'){
//            $userIds = $this->user->getAllUsersByProject($filters->filter['value']);
//            $ids = $userIds->keys()->toArray();
//        }
        if(@$filters->filter['type']=='team'){
            $userIds = $this->user->getAllUsersByTeam($filters->filter['value']);
           $ids = $userIds->keys()->toArray();
        }
        $allUsers = $this->user->datatable(ListViewData::fromRequest($request),$ids);
        $allUsers = $this->user->datatable(ListViewData::fromRequest($request));
        $filePath = 'user/';
        //$allUsers->setCollection(
         //   $allUsers->getCollection()->transform(function ($item, $key) use($filePath){
         //       if($item->image){
          //          $item->image = \Storage::url($filePath . $item->image);
           //     } else{
          //          $item->image = asset('assets/images/default_user.png');
            //    }

            //    return $item;
           // })
        //);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All users'], 'data' => $allUsers];
        return response()->json($output, $code);
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(RegisterRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $request->merge([
            "accounts_id" => implode(",", $request->accounts_id)
        ]);

        $newUser = $this->user->create(UserData::fromRequest($request));

        $mailData['toEmail'] = $newUser->email;
        $mailData['toName'] = $newUser->name;
        $mailData['link'] = route('user.verification',['key'=>base64_encode($newUser->id)]);
        $mailData['subject'] = 'New User';
        //$this->email->newUserSignup($mailData);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['User added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect('user')->with('success', 'User data added successfully.');
        } else{
            return response()->json($output, $code);
        }
    }

    /**
     * @param EditUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function update(EditUserRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $user = $this->user->find((int) $request->get('id'));
        if($user !== NULL){
            $request->merge([
                "accounts_id" => implode(",", $request->accounts_id)
            ]);
            $userData = UserData::fromModel($user)->toRequestUpdate($request);
            $this->user->update($userData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['User data updated successfully.'],'data'=>$userData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['User not found.'],'data'=>null];
        }

        if($request->isForm){
            return redirect('user')->with('success', 'User data updated successfully.');
        } else{
            return response()->json($output, $code);
        }

    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function authenticate(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 417;
        $userData = $this->user->authenticate(UserData::fromRequestForLogin($request));
        $output = ['status' => 'error', 'code' => $code,'messages'=>null, 'errors' => ['Invalid email or password'], 'data' => $userData];
        if($userData){
            auth()->attempt((UserData::fromRequestForLogin($request)));
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            $code = 200;
            $userData->auth_token = $accessToken->token;
            $userData->save();
            $output = ['status' => 'success', 'code' => $code, 'errors' => null, 'messages' => ['User Data'], 'data' => $userData];
        }

        return response()->json($output, $code);
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tableList(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allUsers = $this->user->datatable(ListViewData::fromRequest($request));
        return response()->json($allUsers, $code);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 417;
        $userData = $this->user->forgotPassword($request->all());
        $output = ['status' => 'error', 'code' => $code, 'messages' => ['No user found on email'], 'data' => NULL];
        if($userData){
            //send reset link email
            $mailData['toEmail'] = $userData->email;
            $mailData['toName'] = $userData->name;
            $mailData['subject'] = 'Reset Password Link';
            $this->email->forgotPassword($mailData);
            $code = 200;
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Reset link sent in email'], 'data' => NULL];
        }
        return response()->json($output, $code);
    }

    /**
     * @param ResetPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 417;
        $userData = $this->user->resetPassword($request->all());
        $output = ['status' => 'error', 'code' => $code, 'messages' => ['No user found.'], 'data' => NULL];
        if($userData){
            $code = 200;
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Successfully password reset'], 'data' => NULL];
        }
        return response()->json($output, $code);
    }

    /**
     * @param GetUserDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetUserDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $user_account = $this->user->getAllUsersByAccount($request->id);
        $user   = $this->user->find((int) $request->get('id'));

        $output = ['status' => 'success', 'code' => $code, 'messages' => ['User Detail'], 'data' => $user, 'useraccout' => $user_account];
        return response()->json($output, $code);
    }
}
