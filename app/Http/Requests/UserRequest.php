<?php

namespace App\Http\Requests;

use App\Rules\RoleRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'password' => 'required|max:16'
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
            'phone_number.required' => 'Nomor HP wajib diisi',
            'phone_number.max' => 'Nomor HP maksimal 255 karakter',
            'person_responsible' => 'Penanggung jawab wajib diisi',
            'password.required' => 'Penanggung jawab wajib diisi',
            'password.max' => 'Penanggung jawab maksimal 255 karakter',
        ];
    }
}
