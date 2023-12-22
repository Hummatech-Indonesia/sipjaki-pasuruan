<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerRequest extends FormRequest
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
            'birth_date' => 'required|date|before:today',
            'education' => 'required|max:255',
            'phone_number' => 'required|max:255',
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
            'name.required' => 'Nama diperlukan.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter',
            'birth_date.required' => 'Tanggal lahir diperlukan.',
            'birth_date.date' => 'Tanggal lahir harus valid.',
            'birth_date.before' => 'Tanggal lahir tidak boleh lebih atau sama dengan sekarang.',
            'education.max' => 'Pendidikan tidak boleh lebih dari :max karakter',
            'education.required' => 'Pendidikan diperlukan.',
            'phone_number.required' => 'Nomor registrasi diperlukan.',
            'phone_number.max' => 'Nomor registrasi maksimal :max karakter.',
        ];

    }
}
