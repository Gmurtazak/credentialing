<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiRequest
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
        if($request->phone && \Str::contains($request->apiUrl, 'insurance')){
            $request->merge([
                "phone" => implode(" | ", $request->phone)
            ]);
        }
        if($request->project && \Str::contains($request->apiUrl, 'user')){
            $request->merge([
                "project" => implode(",", $request->project)
            ]);
            $request->merge([
                "project_type" => implode(",", $request->project_type)
            ]);
        }

        if($request->error_count && \Str::contains($request->apiUrl, 'work_assignment_error')){
            $request->merge([
                "error_count" => implode(",", $request->error_count)
            ]);
            $request->merge([
                "error_type" => implode(",", $request->error_type)
            ]);
            $request->merge([
                "mistake" => implode(",", $request->mistake)
            ]);
        }

        $get_post = $request->all();
        $headers = [];//["Authtoken:{$_SESSION['user']->authtoken}"];
        $fields_array = $get_post;
        $api_end_point = "http://".$_SERVER['HTTP_HOST']."/".$get_post['apiUrl'];
        $result = call_api_using_curl($api_end_point,$get_post['apiUrlMethod'],$fields_array,$headers);
        $result = json_decode($result);
        config(['app.api_request_data' => $result]);
        return $next($request);
    }
}
