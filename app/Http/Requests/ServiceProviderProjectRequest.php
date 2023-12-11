<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProviderProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date_start' => 'required|date',
            'date_finish' => 'required|date',
            'file' => 'required|mimes:pdf',
            'progres' => 'required|numeric|between:1,100',
            'description' => 'required',
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
            'date_start.required' => 'Tanggal dimulai wajib diisi',
            'date_start.date' => 'Format tanggal dimulai tidak valid',
            'date_finish.required' => 'Tanggal berakhir wajib diisi',
            'date_finish.date' => 'Format tanggal berakhir tidak valid',
            'progres.required' => 'Progres wajib diisi',
            'progres.numeric' => 'Progres wajib berupa angka',
            'progres.between' => 'Progres yang diinputkan harus diantara 1-100',
            'file.required' => 'File wajib diisi',
            'file.mimes' => 'Format file yang diizinkan hanyalah berformat PDF',
            'description.required' => 'Deskripsi wajib diisi',
        ];
    }
}
