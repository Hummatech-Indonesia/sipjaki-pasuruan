<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'title' => 'required|max:255',
            'code' => 'required|max:255',
            'file' => 'required'
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
            'fiscal_year_id.required' => 'Tahun fiskal wajib diisi',
            'fiscal_year_id.exists' => 'Tahun fiskal tidak valid',
            'title.required' => 'Judul wajib diisi',
            'code.required' => 'Kode wajib diisi',
            'file.required' => 'File wajib diisi'
        ];
    }
}
