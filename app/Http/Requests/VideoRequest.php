<?php

namespace App\Http\Requests;

use App\Rules\CategoryImageRule;
use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'categories' => ['required', new CategoryImageRule],
            'photo' =>
            'required|mimes:mp4',
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
            'photo.required' => 'Foto wajib diisi',
            'photo.mimes' => 'Foto yang anda inputkan harus berupa berekstensi MP4'
        ];
    }
}
