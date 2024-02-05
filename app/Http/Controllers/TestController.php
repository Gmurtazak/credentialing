<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('test',$this->pageData);
    }

    public  function save(Request $request){
        $apiRequestData = config('app.api_request_data');
        $this->pageData = (array) $apiRequestData;
        return view('test',$this->pageData);
    }
}
