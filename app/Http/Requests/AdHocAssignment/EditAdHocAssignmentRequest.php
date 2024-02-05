<?php

namespace App\Http\Requests\AdHocAssignment;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditAdHocAssignmentRequest extends ApiRequest
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
            'id'=>'required|exists:ad_hoc_assignments',
            'date' => 'required',
            'client_id' => 'required',
            'project_id' => 'required',
            'ad_hoc_work_type' => 'required',
            'description' => 'required',
            'minute_utilized' => 'required',
            'hour_utilized' => 'required',
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
