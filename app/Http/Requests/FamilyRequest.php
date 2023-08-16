<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyRequest extends FormRequest
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
            //
            'family_code' => 'required|unique:families,family_code,'.$this->id,
            'category_id' => 'required',
            'culture' => 'required',
            'policy' => 'required',
            'business' => 'required',
            'export' => 'required',
            'family_users' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'street_id' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'family_code.required'    => 'Dữ liệu không được phép để trống',
            'category_id.required'    => 'Dữ liệu không được phép để trống',
            'culture.required'    => 'Dữ liệu không được phép để trống',
            'policy.required'    => 'Dữ liệu không được phép để trống',
            'business.required'    => 'Dữ liệu không được phép để trống',
            'export.required'    => 'Dữ liệu không được phép để trống',
            'family_users.required'    => 'Dữ liệu không được phép để trống',
            'city_id.required'    => 'Dữ liệu không được phép để trống',
            'district_id.required'    => 'Dữ liệu không được phép để trống',
            'street_id.required'    => 'Dữ liệu không được phép để trống',
            'address.required'    => 'Dữ liệu không được phép để trống',
        ];
    }
}
