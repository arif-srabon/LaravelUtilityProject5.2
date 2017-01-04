<?php

namespace App\Http\Requests;

class UserRequest extends Request
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
            'email' => 'required|min:2|unique:users,email,' . $this->id,
            //'password' => 'required|min:5|confirmed',
            'designation_id' => 'required|integer',
            //'password_confirmation' => 'required|min:5',
            'full_name_bn' => 'required|min:5',
            'full_name_en' => 'required|min:5',
            'department_id' => 'required|integer',
            //'date_of_birth' => 'date',
            'father_name' => 'min:5',
            'mother_name' => 'min:5',
            'official_email' => 'email',
            // 'date_of_joining' => 'date',
            'permanent_house_road' => 'min:3',
            'permanent_village' => 'min:3',
            'permanent_division' => 'integer',
            'permanent_district' => 'integer',
            'permanent_upzilla' => 'integer',
            'permanent_postcode' => 'min:3',
            'present_house_road' => 'min:3',
            'present_village' => 'min:3',
            'present_division' => 'integer',
            'present_district' => 'integer',
            'present_upzilla' => 'integer',
            'present_postcode' => 'min:3',
            'user_photo' => 'image|mimes:png,jpeg|image_size:<=600',
            'user_sign' => 'image|mimes:png,jpeg|image_size:<=600',
            'mobile' => 'min:3',
            'passport' => 'min:3',
            'national_id' => 'min:13',
            'marital_status_id' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'full_name_en.required' => 'Provide Valid User Full Name in English.',
            'full_name_en.min' => 'The User Full Name in English must be at least 5 characters.',
            'full_name_bn.required' => 'Provide Valid User Full Name in Bangla.',
            'full_name_bn.min' => 'The User Full Name in Bangla must be at least 5 characters.',
            'email.required' => 'Provide Valid and Unique User Name / Login ID.',
            'email.min' => 'The User Name / Login ID must be at least 5 characters.',
            'email.unique' => 'The User Name has already been Taken.'
        ];
    }
}
