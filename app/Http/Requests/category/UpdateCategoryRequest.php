<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' =>'required|max:100|unique:categories,name,'.request()->id,
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không để trống',
            'name.unique'=>'Danh mục này đã có trong CSDl',
        ];
    }
}
