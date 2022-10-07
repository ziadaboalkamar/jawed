<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'string|required',
            'service_id' => 'required|exists:services,id',
            'region' => 'string|required',
            // 'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'الاسم الاول مطلوب',
            'first_name.string' => 'الاسم الاول يجب ان يكون نص',
            
            'last_name.required' => 'اسم العائلة مطلوب',
            'last_name.string' => 'اسم العائلة يجب ان يكون نص',
            
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.string' => 'رقم الهاتف يجب ان يكون نصا',
            'region.required' => 'المنطقة مطلوبة',
            'region.string' => 'المنطقة يجب ان تكون نص',
        ];
    }
}
