<?php

namespace App\Http\Requests\slider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'name' =>'required|max:250|unique:banners,name,'.request()->id,
            'image' => 'required|image|mimes:jpg,svg,png,gif,jpeg|max:2048|dimensions:min_width=100,
            min_height:100,max_width:1000,max_height:1000',
            'description' => 'required|max:1000',
            'link' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên ảnh không để trống',
            'description.required'=>'Mô tả ảnh không để trống',
            'description.max'=>'Nội dung không được quá 1000 chữ',
            'link.required'=>'Đường dẫn ảnh không để trống',
        ];
    }
}
