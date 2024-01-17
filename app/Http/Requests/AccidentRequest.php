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
            'executor_project_id' => 'required|exists:executor_projects,id',
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
            'executor_project_id.required' => 'Pekerjaan harus diisi.',
            'executor_project_id.exists' => 'Pekerjaan yang dipilih tidak valid.',
            'location.required' => 'lokasi harus diisi.',
            'location.max' => 'lokasi maksimal :max karakter.',
            'time.required' => 'waktu harus diisi.',
            'time.date' => 'Format waktu tidak valid.',
            'description.required' => 'deskripsi harus diisi.',
            'loss.required' => 'kerugian harus diisi.',
            'problem.required' => 'masalah harus diisi.',
        ];

    }
}
