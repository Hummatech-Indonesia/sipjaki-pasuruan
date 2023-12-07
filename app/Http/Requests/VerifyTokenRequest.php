<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyTokenRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required|exists:users,token'
        ];
    }


    /**
     * messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'token.required' => 'Token wajib diisi',
            'token.exists' => 'Token yang anda inputkan tiidak valid'
        ];
    }
}
