<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:150',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'content' => 'required',
        ];;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi',
            'title.max' => 'Judul maksimal 150 karakter',
            'thumbnail.required' => 'Thumbnail wajib diisi',
            'thumbnail.mimes' => 'Thumbnail wajib berformat PNG, JPG, atau JPEG',
            'content.required' => 'Konten wajib diisi'
        ];
    }
}
