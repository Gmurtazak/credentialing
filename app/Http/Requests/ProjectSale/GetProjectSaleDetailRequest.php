<?php

namespace App\Http\Requests\ProjectSale;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class GetProjectSaleDetailRequest extends ApiRequest
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
            'id'=>'required|exists:project_sales',
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
