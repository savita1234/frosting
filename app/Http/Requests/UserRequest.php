<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'middle_name' => 'string',
            'last_name' => 'required|string',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required|string|min:6',
            
        ];
    }

//     public function failedValidation(Validator $validator)
// {
//    throw new HttpResponseException(response()->json([
//      'success'   => false,
//      'message'   => 'Validation errors',
//      'data'      => $validator->errors()
//    ]));
// }
}
