<?php

namespace App\Http\Requests\File;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditFileRequest extends ApiRequest
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
            'file_name' =>'required|unique:files,file_name,'.$this->get('id'),
            'file_link' => 'required',
            'pages' => 'required',
            'dos_count' => 'required',
            'received_on' => 'required',
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
