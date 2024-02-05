<?php

namespace App\Http\Requests\PortalTargets;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddPortalTargetsRequest extends ApiRequest
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
            //'name' => 'required|unique:teams,name',
            'year' => 'required',
            //'file' => 'nullable|sometimes|image|mimes:jpg,png,jpeg,gif',
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
