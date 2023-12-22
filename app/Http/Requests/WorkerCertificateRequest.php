<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerCertificateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => $this->worker_certificate == null ? 'required|mimes:pdf' : 'nullable|mimes:pdf',
            'certificate' => 'required|max:255',
            'registration_number' => 'required|max:255',
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
            'file.required' => 'Kolom file wajib diisi.',
            'file.mimes' => 'File harus berformat PDF.',
            'certificate.required' => 'Kolom sertifikat wajib diisi.',
            'certificate.max' => 'Panjang teks sertifikat tidak boleh melebihi 255 karakter.',
            'registration_number.required' => 'Kolom nomor registrasi wajib diisi.',
            'registration_number.max' => 'Panjang nomor registrasi tidak boleh melebihi 255 karakter.',

        ];

    }
}
