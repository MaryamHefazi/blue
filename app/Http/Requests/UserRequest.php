<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

//            'firstName'=>'required|max:50',
//            'lastName'=>'required|max:50',
//            'email'=>'required',
//            'nationalCode'=>'required',
//            'gender'=>'required',
//            'phoneNumber'=>'required',
//            'country'=>'required',
//            'city'=>'required',
//            'address'=>'required',
//            'education'=>'required',
//            'job'=>'required',
//            'password'=>'required|confirmed',

        ];
    }
}
