<?php

namespace App\Http\Requests\blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' =>'required|max:250',
            'sumary' => 'required|max:1000',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Tên bài viết không để trống',
            'sumary.required'=>'Tóm lược bài viết không để trống',
            'content.required'=>'Nội dung bài viết không để trống',
        ];
    }
}
