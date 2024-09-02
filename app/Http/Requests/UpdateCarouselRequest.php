<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarouselRequest extends FormRequest
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
            // 'carouselId' => 'required|exists:carousels,id',
            'text' => 'required|string',
            'main_title' => 'required|string',
            'main_image' => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }
}
