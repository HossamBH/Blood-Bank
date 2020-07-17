<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'password' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'last_donate' => 'required',
            'city_id' => 'required',
            'blood_type_id' => 'required',
        ];
    }
}
