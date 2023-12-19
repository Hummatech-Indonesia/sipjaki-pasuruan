<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => 'required|exists:password_reset_tokens,token',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required'
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
            'token.required' => 'Token reset password harus diisi.',
            'token.exists' => 'Token reset password tidak valid.',
            'password.required' => 'Kata sandi baru harus diisi.',
            'password.same' => 'Konfirmasi kata sandi tidak cocok dengan kata sandi baru.',
            'password_confirmation.required' => 'Konfirmasi kata sandi harus diisi.',
        ];
    }
}
