<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
            'phone_number' => 'required|max:255',
            'person_responsible' => 'required|max:255',
            'password' => 'nullable|max:16'
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
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus valid',
            'email.max' => 'Email maksimal :max karakter',
            'email.unique' => 'Email sudah digunakan',
            'phone_number.required' => 'Nomor HP wajib diisi',
            'phone_number.max' => 'Nomor HP maksimal 255 karakter',
            'person_responsible' => 'Penanggung jawab wajib diisi',
            'password.max' => 'Penanggung jawab maksimal 255 karakter',
        ];
    }
}
