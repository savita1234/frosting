<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class dailyOrdersRequest extends FormRequest
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
            'branch_id' => 'required',
            'cake_in_kg' => 'required',
            'flavour' => 'required|string',
            'total_amount' => 'required|integer',
            'advanced_amount' => 'required',
            'balanced_amount' => 'required',
            'customer_name' => 'required',
            'customer_number' => 'required',
            'delivery_date' => 'required'
        ];
    }
}
