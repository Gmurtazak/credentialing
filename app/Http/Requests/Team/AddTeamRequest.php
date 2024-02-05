<?php

namespace App\Http\Requests\Team;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddTeamRequest extends ApiRequest
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
            'name' => 'required',
            //'team_lead_id' => 'required',
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
