<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterPostRequets extends FormRequest
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
            "name"=>'required',
            "lastname"=>"required",
            "email"=>'required|string|email|max:255',
            "password"=>'required|string|confirmed|min:6',
            'dni'=>'required'
        ];
    }
}
