<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMessageRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
            'phone.required' => 'حقل الهاتف مطلوب.',
            'phone.string' => 'يجب أن يكون الهاتف نصًا.',
            'subject.required' => 'حقل الموضوع مطلوب.',
            'subject.string' => 'يجب أن يكون الموضوع نصًا.',
            'message.required' => 'حقل الرسالة مطلوب.',
            'message.string' => 'يجب أن تكون الرسالة نصًا.',
        ];
    }
}
