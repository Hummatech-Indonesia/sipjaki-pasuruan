<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubClassificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'classification_id' => 'required|exists:classifications,id',
            'name' => 'required|max:255'
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
            'classification_id.required' => 'Klasifikasi wajib diisi',
            'classification_id.exists' => 'Klasifikasi yang anda pilih tidak tersedia',
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter'
        ];
    }
}
