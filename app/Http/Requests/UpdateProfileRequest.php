<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile' => 'nullable|mimes:png,jpg,jpeg',
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email,' . auth()->user()->id,
            'phone_number' => 'required|numeric|unique:users,phone_number,' . auth()->user()->id,
            'decree' => 'nullable|max:255'
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
            'profile.required' => 'Foto Profile wajib diisi',
            'profile.mimes' => 'Foto Profile harus berformat png, jpg, ataupun jpeg',
            'name.required' => 'Nama wajib di isi',
            'name.max' => 'Nama maksimal :max karakter',
            'email.required' => 'Email wajib di isi',
            'email.max' => 'Email maksimal :max karakter',
            'email.email' => 'Email wajib valid',
            'email.unique' => 'Email sudah digunakan',
            'phone_number.required' => 'Nomor telepon wajib di isi',
            'phone_number.numeric' => 'Nomor telepon wajib angka',
            'phone_number.unique' => 'Nomor telepon sudah digunakan',
            'decree.max' => "SK maksimal :max karakter",
        ];
    }
}
