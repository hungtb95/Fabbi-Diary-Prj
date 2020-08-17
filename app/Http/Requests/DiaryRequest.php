<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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
            'perpage' => 'numeric | min:0 | required',
            'title' => 'min:0',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'perpage.numeric' => 'not a numeric idiot',
            'perpage.required' => 'need input something !!',
            'content.required' => 'need content of diary !!',
        ];
    }
}
