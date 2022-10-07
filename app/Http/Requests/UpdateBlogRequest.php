<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'main_image' => 'image |mimes:png,jpg',
            'sub_title' => 'nullable |string',
            'gallery' => 'nullable |array ',
            'description' => 'nullable',
            'tags' => 'nullable |string',
            'short_description' => 'nullable',

        ];
    }
}
