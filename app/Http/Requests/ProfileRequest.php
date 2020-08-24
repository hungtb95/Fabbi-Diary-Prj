<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'address' => 'nullable',
            'phone_number' => 'nullable',
            'country' => 'nullable',
            'birthday' => 'nullable',
        ];
    }
}
