<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'category_id'=>'required',
            'sku'=>'required',
            'name'=>'required|min:3',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'img'=>'sometimes|image', // file phải là định dạng ảnh
        ];
    }
    public function messages()
    {
        return [
            'category_id.required'=>'Danh mục không được để trống',
            'sku.required'=>'Mã sản phẩm không được để trống!',
            'name.required'=>'Tên sản phẩm không được để trống!',
            'name.min'=>'Tên sản phẩm phải lớn hơn 3 ký tự!',
            'price.required'=>'Giá sản phẩm không được để trống!',
            'price.numeric'=>'Giá sản phẩm phải là số!',
            'quantity.required'=>'Số lượng không được để trống',
            'quantity.numeric'=>'Số lượng phải là số!',
            'img.image'=>'File ảnh không đúng định dạng!',
        ];
    }
}
