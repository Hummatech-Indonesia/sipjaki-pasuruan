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
            'video' =>
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
            'video.required' => 'Foto wajib diisi',
            'video.mimes' => 'Foto yang anda inputkan harus berupa berekstensi PNG, JPG Ataupun JPEG'
        ];
    }
}
