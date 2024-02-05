<?php

namespace App\Http\Requests\ProjectSale;

use App\Support\Request\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditProjectSaleRequest extends ApiRequest
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
            'project_name' => 'required',
            'project_type_id' => 'required',
            'project_details' => 'required',
            'client_id' => 'required',
            'country' => 'required',
            'project_price' => 'required',
            'our_bid' => 'required',
            'contact_date' => 'required',
            'is_meeting_requested' => 'required',
            'meeting_datetime' => 'required',
            //'meeting_status' => 'required',
            'comments' => 'required',
            'is_convertion' => 'required',
//            'reason' => 'required',
//            'reason_details' => 'required',
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
