<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

            return $next($request);
            /*
            $authtoken = $request->bearerToken();
            if(auth()->user()){
                $authtoken = auth()->user()->auth_token;
            }
            if($authtoken == null or $authtoken == '')
            {
                $code = 498;
                $status = 'error';
                $errors = "AuthToken is either empty or null";
                $messages = [];
                $data = NULL;
                return response(['code' => $code,'status' => $status,'errors' => $errors,'messages' => $messages,'data' => $data],$code);
            }

            $user = User::where('auth_token', $authtoken)->first();

            if ($user)
            {
                auth()->login($user);
                return $next($request);
            }
            else
            {
                $code = 403;
                $status = 'error';
                $errors = "Invalid Token";
                $messages = [];
                $data = NULL;
                return response(['code' => $code,'status' => $status,'errors' => $errors,'messages' => $messages,'data' => $data],$code);
            }*/
        // else{
        //     return $next($request);
        // }
    }
}
