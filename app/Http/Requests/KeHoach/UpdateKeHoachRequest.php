<?php

namespace App\Http\Requests\KeHoach;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKeHoachRequest extends FormRequest
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
            "MaKeHoach" => ['bail','string', Rule::unique('kehoach')->ignore($this->kehoach)],
            "MaXuong" => ['required'],
            "MaLoaiQuyTrinh" => ['required'],
            "NgayBatDau" => ['required'],
            "NgayKetThuc" => ['required'],
            "NoiDungKeHoach" => ['string','nullable'],
            "GhiChu" => ['string','nullable'],
        ];
    }
    public function messages() : array
    {
        return [
        'unique' => 'Mã kế hoạch bị trùng',
        'required' => 'Trường này không được trống',
        'string' => 'A message is String',
        ];
    }
}
