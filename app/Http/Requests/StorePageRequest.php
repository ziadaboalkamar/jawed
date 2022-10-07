<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title' => 'required |max:150',
            'main_image' => 'required |image |mimes:png,jpg',
            'menu_id' => 'required',
            'sub_title' => 'nullable |string',
            'gallery' => 'nullable |array ',
            'description' => 'nullable',
            'tags' => 'nullable |string',

        ];
    }
}
