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
            'birth_date' => 'required|date',
            'address' => 'required',
            'position' => 'required',
            'education' => 'education',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'nama wajib diisi',
            'address.required' => 'alamat wajib diisi',
            'position.required' => 'posisi wajib diisi',
            'education.required' => 'pendidikan wajib diisi',
            'name.max' => 'Nama maksimal 150',
            'birth_date.date' => 'Tanggal harus valid',
            'birth_date.required' => 'Tanggal wajib di isi',
        ];
    }
}
