<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'email | required',
            'password' => 'min:6 | required',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email must be email type',
            'email.required' => 'Please fill out the email section',
            'password.min' => 'Password need more than 5 char',
            'password.required' => 'Please fill out the password section',
        ];
    }
}
