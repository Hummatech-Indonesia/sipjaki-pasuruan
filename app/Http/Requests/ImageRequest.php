<?php

namespace App\Http\Requests;

use App\Rules\CategoryImageRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImageRequest extends FormRequest
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
            'photo' => [
                'required',
            ],
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
            'categories.required' => 'Kategori wajib diisi',
            'photo.required' => 'Foto wajib diisi',
            'photo.mimes' => 'Foto yang anda inputkan harus berupa berekstensi PNG, JPG Ataupun JPEG'
        ];
    }
}
