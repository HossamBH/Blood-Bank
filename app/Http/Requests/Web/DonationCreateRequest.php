<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class DonationCreateRequest extends FormRequest
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
            'age' => 'required:digits',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags_num' => 'required:digits',
            'hospital_name' => 'required',
            'hospital_location' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required',
            'notes' => 'required',
            'client_id' => 'required'
        ];
    }
}
