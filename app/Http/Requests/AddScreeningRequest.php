<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddScreeningRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'birth_date' =>'required|date|before:18 years ago',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'birth_date.required' => 'Date of birth is required!',
            'birth_date.before' => 'Participants must be over 18 years of age'
        ];
    }
}
