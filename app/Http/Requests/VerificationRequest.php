<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judiciary_number' => 'required|max:255',
            'judiciary_date' => 'required|date',
            'district_court_number' => 'required|max:255',
            'district_court_date' => 'required|date',
            'state_institution_number' => 'required|max:255',
            'state_institution_date' => 'required|date'
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'judiciary_number.required' => 'Nomor yudisial harus diisi.',
            'judiciary_number.max' => 'Nomor yudisial tidak boleh melebihi 255 karakter.',
            'judiciary_date.required' => 'Tanggal yudisial harus diisi.',
            'judiciary_date.date' => 'Tanggal yudisial harus dalam format tanggal yang valid.',
            'district_court_number.required' => 'Nomor pengadilan distrik harus diisi.',
            'district_court_number.max' => 'Nomor pengadilan distrik tidak boleh melebihi 255 karakter.',
            'district_court_date.required' => 'Tanggal pengadilan distrik harus diisi.',
            'district_court_date.date' => 'Tanggal pengadilan distrik harus dalam format tanggal yang valid.',
            'state_institution_number.required' => 'Nomor lembaga negara harus diisi.',
            'state_institution_number.max' => 'Nomor lembaga negara tidak boleh melebihi 255 karakter.',
            'state_institution_date.required' => 'Tanggal lembaga negara harus diisi.',
            'state_institution_date.date' => 'Tanggal lembaga negara harus dalam format tanggal yang valid.',
        ];

    }
}
