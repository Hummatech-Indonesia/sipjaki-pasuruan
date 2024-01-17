<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadConsultantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contract' => 'nullable|mimes:pdf',
            'administrative_minutes' => 'nullable|mimes:pdf',
            'report' => 'nullable|mimes:pdf',
            'minutes_of_disbursement' => 'nullable|mimes:pdf',
            'minutes_of_hand_over' => 'nullable|mimes:pdf'
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
            'contract.mimes' => 'Berkas Kontrak harus berformat PDF.',
            'administrative_minutes.mimes' => 'Berkas Berita Acara Administrasi harus berformat PDF.',
            'report.mimes' => 'Berkas Laporan harus berformat PDF.',
            'minutes_of_disbursement.mimes' => 'Berkas Berita Acara Pencairan harus berformat PDF.',
            'minutes_of_hand_over.mimes' => 'Berkas Berita Acara Serah Terima harus berformat PDF.'
        ];
    }
}
