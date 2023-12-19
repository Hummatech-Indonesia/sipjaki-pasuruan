<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoundingDeepRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'deed_number' => 'required|max:255',
            'notary_name' => 'required|max:255',
            'address' => 'required',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'deed_date' => 'required|date'
        ];
    }
}
