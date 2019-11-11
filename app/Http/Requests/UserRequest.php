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
            'email' => 'required|email|unique:users',
            'name'  => 'required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '邮箱必须',
            'email.unique' => '邮箱被占用',
            'name.required'  => '名字必须',
        ];
    }
}
