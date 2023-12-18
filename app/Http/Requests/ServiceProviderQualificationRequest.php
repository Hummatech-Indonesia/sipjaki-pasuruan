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
            'service_provider_id' => 'required|exists:service_providers,id',
            'qualification_id' => 'required|exists:qualifications,id',
            'year' => 'required|max:4',
        ];
    }

    public function messages(): array
    {
        return [
            'sub_classification_id.required' => 'Sub Klasikafikasi wajib diisi',
            'sub_classification_id.exists' => 'Sub Klasikafikasi tidak valid',
            'service_provider_id.required' => 'Penyedia Jasa wajib diisi',
            'service_provider_id.exists' => 'Penyedia Jasa tidak valid',
            'qualification_id.required' => 'Kualifikasi wajib diisi',
            'qualification_id.exists' => 'Kualifikasi tidak valid',
            'year.required' => 'Tahun wajib diisi',
            'year.max' => 'Tahun maksimal 4 karakter',
        ];
    }
}
