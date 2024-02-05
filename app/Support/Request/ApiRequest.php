<?php

namespace App\Support\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidatesWhenResolvedTrait;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $code = 417;
        $output = new Response(['status' => 'error', 'code' => $code,'errors' => $validator->messages()->all(),'messages'=>[],'data'=>[]],422);
        throw new ValidationException($validator, $output);
    }
}
