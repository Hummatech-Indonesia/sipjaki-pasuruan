<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DinasRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone_number' => 'required|max:255',
            'email' => 'required|email|max:255',
            'name_opd' => 'required|max:255',
            'address' => 'required',
            'phone_number_opd' => 'numeric|required',
            'person_responsible' => 'required|max:255',
            'position' => 'required',
            'civil_servant_identity_number' => 'required'
        ];
    }
}
