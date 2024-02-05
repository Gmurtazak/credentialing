<?php

namespace App\Http\Requests\Department;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditDepartmentRequest extends ApiRequest
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
            'id'=>'required',
            'name' =>'required|unique:departments,name,'.$this->get('id'),
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
