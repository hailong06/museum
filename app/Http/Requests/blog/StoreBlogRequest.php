<?php

namespace App\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title' =>'required|unique:blogs|max:250',
            'image' => 'required|image|mimes:jpg,svg,png,gif,jpeg|max:2048|dimensions:min_width=100,
            min_height:100,max_width:1000,max_height:1000',
            'sumary' => 'required|max:1000',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Tên bài viết không để trống',
            'title.unique'=>'Tên bài viết này đã có trong CSDl',
            'image.required'=>'Hình ảnh bài viết không để trống',
            'sumary.required'=>'Tóm lược bài viết không để trống',
            'content.required'=>'Nội dung bài viết không để trống',
        ];
    }
}
