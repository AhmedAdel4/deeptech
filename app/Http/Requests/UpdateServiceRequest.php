<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'serviceId' => 'required|exists:services,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'opening_speech' => 'required|string',
            'detail_image' => 'nullable|file|mimes:png,jpg,jpeg',
        ];
    }
}
