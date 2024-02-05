<?php

namespace App\Http\Requests\User;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email',
            //'password' => 'required|min:3',
            'dob' => 'required|date_format:Y-m-d',
            'gender' => 'required|in:m,f',
            'phone' => 'string|nullable',
            'address' => 'string|nullable',
            'country' => 'string|nullable',
            'state' => 'string|nullable',
            'city' => 'string|nullable',
            'employee_id' => 'required',
            'department_id'=>'required|exists:departments,id',
            'team_id' => 'required|exists:teams,id',
            'report_to' => 'required|exists:users,id',
            'role_id' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [

        ];
    }
}
