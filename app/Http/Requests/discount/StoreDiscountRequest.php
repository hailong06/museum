<?php

namespace App\Http\Requests\discount;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
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
            'code' =>'required|unique:discounts|max:100',
            'condition' =>'required|max:100',
            'reduce' =>'required|max:100',
            'start' =>'required|before_or_equal:end',
            'end' =>'required|after_or_equal:start',
            'status' => 'required',
        ];
    }
}
