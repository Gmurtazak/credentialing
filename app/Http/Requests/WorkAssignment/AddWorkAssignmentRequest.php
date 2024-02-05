<?php

namespace App\Http\Requests\WorkAssignment;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddWorkAssignmentRequest extends ApiRequest
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
            'assigned_date' => 'required',
            'assigned_to' => 'required',
            'received_on' => 'required',
            'file_id' => 'required',
            'insurance_id' => 'required',
            'pages' => 'required',
            'account_id' => 'required',
            'client_id' => 'required',
            'category_id' => 'required',
            'project_id' => 'required',
            'project_type_id' => 'required',
            'entity_id' => 'required',
            'dos_count' => 'required',
            'amount' => 'required',
            'assigned_dos' => 'required',
            'hours' => 'required',
            'file_link' => 'required',
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
