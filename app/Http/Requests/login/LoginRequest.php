<?php

namespace App\Http\Requests\login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Cannot be left blank',
            'email.email' => 'Please enter the correct format',
            'password.required' => 'Cannot be left blank',
        ];
    }
}
