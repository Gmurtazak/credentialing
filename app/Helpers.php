<?php
use App\Models\User;

if (! function_exists('getDateFormat')) {
    function getDateFormat($date,$format){
        return \Carbon\Carbon::parse($date)->format($format);
    }
}
if (! function_exists('getCalendarDates')) {
    function getCalendarDates($dates){
        return explode(' - ',$dates);
    }
}
if (! function_exists('userHasRight')) {
    function userHasRight($right,$id){
        $rights = [];
        $user = User::firstWhere('id', $id);
        if($user && $user->roles()->get() !== null) {
            $userRole = $user->roles()->get()[0];
            $userRights = $userRole->rights()->get();
            $userRights = $userRights->map(function ($data) {
                return strtolower(str_replace(' ', '-', $data->right));
            });
            if ($userRole->role == 'Administrator') {
                return true;
            } else {
                return $userRights->contains($right);
            }
        } else{
            return true;
        }
    }
}

if (! function_exists('getReportsTo')) {
    function getReportsTo($id)
    {
        return User::where('report_to', $id)->pluck('id')->toArray();
    }
}

if (! function_exists('userRole')) {
    function userRole($id=0){
        $rights = [];
        $user = User::firstWhere('id', $id);
        if($user && $user->roles()->get() !== null) {
            $userRole = $user->roles()->get()[0];
            return strtolower($userRole->role);
        } else{
            return 'administrator';
        }
    }
}

if (! function_exists('userTeamId')) {
    function userTeamId($id=0){
        $rights = [];
        $user = User::firstWhere('id', $id);
        if($user) {
            return $user->team_id;
        } else{
            return 0;
        }
    }
}

if (! function_exists('isBidder')) {
    function isBidder($id=0){
        $user = User::firstWhere('id', $id);
        if($user){
            $user->jobDescription;
            if(isset($user->jobDescription)){

                if($user->jobDescription->name == "Bidder"){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
    }
}
if (! function_exists('isCloser')) {
    function isCloser($id=0){
        $user = User::firstWhere('id', $id);
        if($user){
            $user->jobDescription;
            if(isset($user->jobDescription)){

                if($user->jobDescription->name == "Closer"){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

    }
}

if (! function_exists('call_api_using_curl')) {
    function call_api_using_curl($url = '', $method = 'GET', $fields_array = [], $headers = [])
    {
        $user = auth()->user();
        $token = null;
        if($user){
            $token='Bearer '.$user->auth_token;
        }
        $headers = ["Authorization: {$token}"];
        $curl_handle = curl_init();
        //curl_setopt($curl_handle, CURLOPT_HEADER, 0);
        //curl_setopt($curl_handle, CURLOPT_VERBOSE, 0);
        switch (strtoupper($method)) {
            case 'HEAD':
                curl_setopt($curl_handle, CURLOPT_NOBODY, true);
                break;
            case 'POST':
                curl_setopt($curl_handle, CURLOPT_POST, true);
                curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $fields_array);

                break;
            case 'GET':
                curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, $method);

                if (is_array($fields_array) and count($fields_array)) {
                    //curl_setopt( $curl_handle, CURLOPT_POST, true );
                    //curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $fields_array);
                    $url .= '?' . http_build_query($fields_array);
                }
                break;
            case 'PUT':
                curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $fields_array);
                break;
            default:
                curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, $method);
                if (is_array($fields_array) and count($fields_array)) {
                    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $fields_array);
                }
                break;
        }

        if (is_array($headers) and count($headers)) {
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        return $buffer;
    }
}

if (! function_exists('my_var_dump')) {
    function my_var_dump($string)
    {
        $http_host = isset($_SERVER['HTTP_HOST']) ? true : false;
        $line_break = isset($_SERVER['HTTP_HOST']) ? "<br>" : "\n";
        $pre_tag_open = isset($_SERVER['HTTP_HOST']) ? "<pre>" : "\n";
        $pre_tag_close = isset($_SERVER['HTTP_HOST']) ? "</pre>" : "\n";

        if(is_array($string) or is_object($string))
        {
            echo $pre_tag_open;
            print_r($string);
            echo $pre_tag_close;
        }
        elseif(is_string($string))
        {
            echo $string.$line_break;
        }
        else
        {
            echo $pre_tag_open;
            var_dump($string);
            echo $pre_tag_close;
        }
    }
}

