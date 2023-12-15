<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassificationTrainingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('classification_trainings', 'name')->ignore($this->classification_training->id)],
            'code' => 'required',
            'description' => 'required',
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama sudah digunakan',
            'kode.required' => 'Kode wajib diisi',
            'description.required' => 'Deskripsi wajib di isi',
        ];
    }
}
