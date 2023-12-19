<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judiciary_number' => 'required|max:255',
            'judiciary_date' => 'required|date',
            'district_court_number' => 'required|max:255',
            'district_court_date' => 'required|date',
            'state_institution_number' => 'required|max:255',
            'state_institution_date' => 'required|date'
        ];
    }
}
