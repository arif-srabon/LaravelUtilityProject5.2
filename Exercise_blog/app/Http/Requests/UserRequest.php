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
            'full_name' => 'required|min:5',
//            'designation_id' => 'required',
            'user_photo' => 'image|mimes:png,jpeg|image_size:<=600',
            'mobile' => 'min:3',
            'password'=>'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#])[A-Za-z\d$@$!%*?&#]{6,}[\S]$/|confirmed',
        ];
    }

    public function messages()
    {
        return [
//            'email.unique' => "Duplicate User Name / Login ID.",
            'email.unique' => "The User Name / Login ID has Already been Taken.",
            'password.regex' => "Password should be combination of Uppercase, Lowercase, Numeric and special Character.",
//            'official_email' => "Provide Valid Email Address."
        ];
    }
}
