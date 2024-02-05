<?php

namespace App\Http\Requests\BusinessType;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditBusinessTypeRequest extends ApiRequest
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
            'business_type_name' =>'required|unique:business_types,business_type_name,'.$this->get('id'),
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
