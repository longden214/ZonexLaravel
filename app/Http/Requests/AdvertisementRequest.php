<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
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
            'image' => 'required',
            'key' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Hình ảnh không được để trống',
            'key.required' => 'Key không được để trống',
        ];
    }
}
