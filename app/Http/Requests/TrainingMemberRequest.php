<?php

namespace App\Http\Requests;

use App\Rules\GenderRule;
use Illuminate\Foundation\Http\FormRequest;

class TrainingMemberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'address' => 'required',
            'phone_number' => 'required',
            'decree' => 'required',
            'gender' => ['required', new GenderRule],
            'file' => 'required',
            'national_identity_number' => 'required|max:18',
            'education' => 'required',
        ];
    }
}
