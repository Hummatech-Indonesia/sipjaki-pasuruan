<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'import' => 'required|mimes:xlsx,xls'
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
            'import.required' => 'File wajib diisi',
            'import.mimes' => 'Extensi fIle yang anda inputkan wajib berupa XLSX dan XLS'
        ];
    }
}
