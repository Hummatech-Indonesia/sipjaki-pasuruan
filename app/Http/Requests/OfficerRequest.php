<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:150',
            'birth_date' => 'required|date|before:today',
            'address' => 'required',
            'position' => 'required|max:255',
            'education' => 'required|max:255',
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
            'name.required' => 'nama wajib diisi',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'address.required' => 'alamat wajib diisi',
            'position.required' => 'posisi wajib diisi',
            'position.max' => 'Posisi tidak boleh lebih dari :max karakter',
            'education.required' => 'pendidikan wajib diisi',
            'education.max' => 'Pendidikan tidak boleh lebih dari :max karakter',
            'name.max' => 'Nama maksimal 150',
            'birth_date.date' => 'Tanggal harus valid',
            'birth_date.required' => 'Tanggal wajib di isi',
            'birth_date.before' => 'Tanggal lahir harus kurang dari sekarang',
        ];
    }
}
