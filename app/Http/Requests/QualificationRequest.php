<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QualificationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
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
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'file.required' => 'File wajib diisi',
            'file.mimes' => 'File yang diizinkan harus bertipe PDF'
        ];
    }
}
