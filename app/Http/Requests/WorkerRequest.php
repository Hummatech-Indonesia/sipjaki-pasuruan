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
            'name' => 'required',
            'birth_date' => 'required',
            'education' => 'required',
            'registration_number' => 'required',
            'cerificate' => 'required'
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
            'birth_date.required' => 'Tanggal lahir diperlukan.',
            'education.required' => 'Pendidikan diperlukan.',
            'registration_number.required' => 'Nomor registrasi diperlukan.',
            'cerificate.required' => 'Sertifikat diperlukan.'
        ];

    }
}
