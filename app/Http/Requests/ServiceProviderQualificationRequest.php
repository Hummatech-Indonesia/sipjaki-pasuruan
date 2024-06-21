<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProviderQualificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sub_classification_id' => 'required|exists:sub_classifications,id',
            'qualification_id' => 'required|exists:qualifications,id',
            'year' => 'required|max:4',
            'file' =>  ($this->serviceProviderQualification == null) ? 'required|file' : 'nullable',
            'expired_at' => 'date|after_or_equal:today'
        ];
    }

    public function messages(): array
{
    return [
        'sub_classification_id.required' => 'Sub Klasifikasi wajib diisi.',
        'sub_classification_id.exists' => 'Sub Klasifikasi yang dipilih tidak valid.',
        'qualification_id.required' => 'Kualifikasi wajib diisi.',
        'qualification_id.exists' => 'Kualifikasi yang dipilih tidak valid.',
        'year.required' => 'Tahun wajib diisi.',
        'year.max' => 'Tahun harus terdiri dari maksimal 4 digit.',
        'file.required' => 'File wajib diunggah.',
        'file.file' => 'File yang diunggah harus berupa file yang valid.',
        'expired_at.date' => 'Tanggal kedaluwarsa harus dalam format tanggal yang benar.',
        'expired_at.after_or_equal' => 'Tanggal kedaluwarsa harus hari ini atau setelahnya.'
    ];
}
}
