<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'type_of_processing' => 'nullable|string|in:rent,purchase',
            'location' => 'nullable|string',
            'searchText' => 'nullable|string',
            'type_id' => 'nullable|integer|exists:types,id'
        ];
    }
}
