<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssociationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', Rule::unique('associations', 'name')->ignore($this->association)],
            'email' => ['required', 'email', 'max:255', Rule::unique('associations', 'email')->ignore($this->association)],
            'email_leader' => ['required', 'max:255', Rule::unique('associations', 'email_leader')->ignore($this->association)],
            'address' => 'required',
            'city' => 'required|max:50',
            'postal_code' => 'required|max:10',
            'phone_number' => 'required|max:15',
            'leader' => 'required|max:255',
            'address_leader' => 'required|max:255',
            'phone_number_leader' => 'required|max:15',
        ];
    }
}
