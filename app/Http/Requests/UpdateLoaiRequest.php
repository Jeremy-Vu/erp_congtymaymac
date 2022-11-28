<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLoaiRequest extends FormRequest
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
            'MaLoai' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'exists:loai,MaLoai',
                'max:50',
            ],
            'TenLoai' => [
                'bail', // khi gặp lỗi sẽ báo về luôn
                'required',
                'max:100',
                Rule::unique('loai')->ignore($this->loai),
            ],
            'MauSac' => [
                'bail',
                'required',
            ],
            'ViTriXep' => [
                'bail',
                'required',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'unique' => ':attribute đã tồn tại',
            'required' => ':attribute bắt buộc phải nhập',
            'string' => ':attribute phải là kiểu chữ',

            'MaLoai.exists' => ':attribute không tồn tại trong kho dữ liệu',
            'MaLoai.max' => ':attribute tối đa 20 ký tự',

            'TenLoai.max' => ':attribute tối đa 50 ký tự',
        ];
    }

    public function attributes(): array
    {
        return [
            'MaLoai' => 'Mã loại sản phẩm',
            'TenLoai' => 'Tên loại sản phẩm',
            'MauSac' => 'Mã màu',
            'ViTriXep' => 'Vị trí kho',
        ];
    }
}
