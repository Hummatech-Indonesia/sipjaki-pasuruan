<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExecutorProjectRequest extends FormRequest
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
            'p1_meeting_minutes' => 'nullable|mimes:pdf',
            'p2_meeting_minutes' => 'nullable|mimes:pdf',
            'mutual_check_0' => 'nullable|mimes:pdf',
            'mutual_check_100' => 'nullable|mimes:pdf',
            'uitzet_minutes' => 'nullable|mimes:pdf',
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
            'contract.mimes' => 'Berkas Kontrak harus berformat PDF.',
            'administrative_minutes.mimes' => 'Berkas Berita Acara Administrasi harus berformat PDF.',
            'p1_meeting_minutes.mimes' => 'Berkas Berita Acara P1 harus berformat PDF.',
            'p2_meeting_minutes.mimes' => 'Berkas Berita Acara P2 harus berformat PDF.',
            'mutual_check_0.mimes' => 'Berkas Mutual Check 0 harus berformat PDF.',
            'mutual_check_100.mimes' => 'Berkas Mutual Check 100 harus berformat PDF.',
            'minutes_of_disbursement.mimes' => 'Berkas Berita Acara Pencairan harus berformat PDF.',
        ];
    }
}
