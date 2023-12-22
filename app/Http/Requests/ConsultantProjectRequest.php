<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantProjectRequest extends FormRequest
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
            'contract.mimes' => 'Berkas kontrak harus berformat PDF.',
            'administrative_minutes.mimes' => 'Berkas menit administratif harus berformat PDF.',
            'report.mimes' => 'Berkas laporan harus berformat PDF.',
            'minutes_of_disbursement.mimes' => 'Berkas catatan pencairan harus berformat PDF.',
        ];
    }
}
