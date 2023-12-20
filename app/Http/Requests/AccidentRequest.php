<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccidentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_id' => 'required|exists:projects,id',
            'location' => 'required|max:255',
            'time' => 'required|date',
            'description' => 'required',
            'loss' => 'required',
            'problem' => 'required',
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
            'project_id.required' => 'Kolom project harus diisi.',
            'project_id.exists' => 'Project yang dipilih tidak valid.',
            'location.required' => 'Kolom lokasi harus diisi.',
            'location.max' => 'Kolom lokasi maksimal :max karakter.',
            'time.required' => 'Kolom waktu harus diisi.',
            'time.date' => 'Format waktu tidak valid.',
            'description.required' => 'Kolom deskripsi harus diisi.',
            'loss.required' => 'Kolom kerugian harus diisi.',
            'problem.required' => 'Kolom masalah harus diisi.',
        ];

    }
}
