<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'branch_name' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'map_address' => 'nullable|string'
        ];
    }
}
