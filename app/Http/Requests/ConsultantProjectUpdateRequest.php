<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantProjectUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_package' => 'nullable|max:255',
            'project_value' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name_package' => 'Nama paket maksimal 255 karakter',
            'project_value' => 'Nilai kontrak harus berupa angka',
        ];
    }
}
