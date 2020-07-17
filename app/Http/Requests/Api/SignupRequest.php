<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|unique:clients',
            'city_id' => 'required',
            'birth_date' => 'required|date',
            'last_donate' => 'required',
            'blood_type_id' => 'required',
            'last_donate' => 'required|date',
        ];
    }
}
