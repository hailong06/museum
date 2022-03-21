<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' =>'required|max:100',
            'email' => 'required|email|unique:users,email,'.request()->id,
            'address' => 'required|max:1000',
            'phone' => 'required|max:15|min:10',
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không để trống',
            'name.max'=>'Tên quá dài',
            'email.required'=>'Tên email này không để trống',
            'email.unique'=>'Tên email này đã có trong CSDl',
            'email.email'=>'Vui lòng nhập đúng định dạng Email',
            'address.required'=>'Địa chỉ không để trống',
            'address.max'=>'Địa chỉ quá dài',
            'phone.required'=>'Số điện thoại không để trống',
            'role.required'=>'Vị trí không để trống',
        ];
    }
}
