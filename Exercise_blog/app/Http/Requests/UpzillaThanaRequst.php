<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpzillaThanaRequst extends FormRequest
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
//            .($this->id == null?"":",".$this->id)
            'name' => 'required|unique:thana_upazillas',
            'name_bn' => 'required|unique:thana_upazillas',
            'geo_code' => 'required|unique:thana_upazillas',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Provide name',
            'name_bn.required' => 'Provide name in bangla',
            'geo_code.required' => 'Provide Valid Geo Code'
        ];
    }
}
