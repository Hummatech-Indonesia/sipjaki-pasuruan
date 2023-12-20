<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contract' => 'nullable|mimes:png,jpg,jpeg',
            'administrative_minutes' => 'nullable|mimes:png,jpg,jpeg',
            'report' => 'nullable|mimes:png,jpg,jpeg',
            'minutes_of_disbursement' => 'nullable|mimes:png,jpg,jpeg',
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
            'contract.nullable' => 'File kontrak harus berupa gambar dengan ekstensi .png, .jpg, atau .jpeg.',
            'contract.mimes' => 'Format file kontrak tidak valid. Harus berupa file dengan ekstensi .png, .jpg, atau .jpeg.',

            'administrative_minutes.nullable' => 'File catatan administratif harus berupa gambar dengan ekstensi .png, .jpg, atau .jpeg.',
            'administrative_minutes.mimes' => 'Format file catatan administratif tidak valid. Harus berupa file dengan ekstensi .png, .jpg, atau .jpeg.',

            'report.nullable' => 'File laporan harus berupa gambar dengan ekstensi .png, .jpg, atau .jpeg.',
            'report.mimes' => 'Format file laporan tidak valid. Harus berupa file dengan ekstensi .png, .jpg, atau .jpeg.',

            'minutes_of_disbursement.nullable' => 'File catatan pencairan harus berupa gambar dengan ekstensi .png, .jpg, atau .jpeg.',
            'minutes_of_disbursement.mimes' => 'Format file catatan pencairan tidak valid. Harus berupa file dengan ekstensi .png, .jpg, atau .jpeg.',
        ];
    }
}
