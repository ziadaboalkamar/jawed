<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlaneRequest extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'sub_service_id' => "required|exists:sub_services,id",
            'type' => 'required',
            'during' => 'required',
            'featureName.*' => 'required',
            'featureValue.*' => 'required'
        ];
    }
}
