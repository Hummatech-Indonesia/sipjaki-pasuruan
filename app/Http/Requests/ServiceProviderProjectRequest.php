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
            'date_finish' => 'nullable|date|after_or_equal:date_start',
            'file' => 'nullable|mimes:pdf',
            'week' => 'required|numeric|min:0',
            'progres' => 'nullable|numeric|between:0,100',
            'description' => 'required',
            'page' => 'nullable',
            'type' => 'nullable'
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
            'date_finish.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
            'progres.required' => 'Progres wajib diisi',
            'progres.numeric' => 'Progres wajib berupa angka',
            'progres.between' => 'Progres yang diinputkan harus diantara 1-100',
            'file.required' => 'File wajib diisi',
            'file.mimes' => 'Format file yang diizinkan hanyalah berformat PDF',
            'description.required' => 'Deskripsi wajib diisi',
        ];
    }

    protected function prepareForValidation()
    {
        if(!$this->date_finish) $this->merge(['date_finish' => $this->date_start]);
        if(!$this->progress) $this->merge(['progres' => 0]);
    }
}
