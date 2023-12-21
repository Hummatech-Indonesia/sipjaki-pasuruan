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
            'rule_category_id' => 'required|exists:rule_categories,id',
            'year' => 'required|integer',
            'title' => 'required|max:255',
            'code' => 'required|max:255',
            'file' => ($this->rule != null) ? 'mimes:pdf,xlsx,docx' : 'required|mimes:pdf,xlsx,docx'
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
            'rule_category_id.required' => 'Kategori wajib diisi',
            'rule_category_id.exists' => 'Kategori tidak valid',
            'year.required' => 'Tahun wajib diisi',
            'title.required' => 'Judul wajib diisi',
            'code.required' => 'Kode wajib diisi',
            'file.required' => 'File wajib diisi',
            'file.mimes' => 'File harus berformat Pdf, Xlsx, dan Docx'
        ];
    }
}
