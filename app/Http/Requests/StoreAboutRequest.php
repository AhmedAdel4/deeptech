<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'main_title' => 'required|string',
            'opening_speech' => 'required|string',
            'details' => 'required|string',
            'main_images' => 'nullable|array|max:3',
            'main_images.*' => 'file|mimes:png,jpg,jpeg',
            'detail_image' => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }
}
