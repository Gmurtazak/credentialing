<?php

namespace App\Http\Requests\WorkAssignmentLog;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddWorkAssignmentLogRequest extends ApiRequest
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
            'work_assignment_id'=>'required|exists:work_assignments,id',
            'dos_complete' => 'required',
            'dos_pending' => 'required',
            'dos_total' => 'required',
            'hours' => 'required',
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
