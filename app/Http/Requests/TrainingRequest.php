<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'fund_source_id' => 'required|exists:fund_sources,id',
            'training_method_id' => 'required|exists:training_methods,id',
            'sub_classification_training_id' => 'required|exists:sub_classification_trainings,id',
            'qualification_training_id' => 'required|exists:qualification_trainings,id',
            'qualification_level_training_id' => 'required|exists:qualification_level_trainings,id',
            'name' => 'required|max:255',
            'organizer' => 'required|max:255',
            'start_at' => 'required|before:end_time|date',
            'end_time' => 'required|date',
            'lesson_hour' => 'required|integer|max:100|min:0',
            'location' => 'required|max:255',
            'description' => 'required|max:2048'
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
            'fiscal_year_id.required' => 'Tahun fiskal harus diisi.',
            'fiscal_year_id.exists' => 'Tahun fiskal tidak valid.',
            'fund_source_id.required' => 'Sumber dana harus diisi.',
            'fund_source_id.exists' => 'Sumber dana tidak valid.',
            'training_method_id.required' => 'Metode pelatihan harus diisi.',
            'training_method_id.exists' => 'Metode pelatihan tidak valid.',
            'sub_classification_training_id.required' => 'Sub-klasifikasi pelatihan harus diisi.',
            'sub_classification_training_id.exists' => 'Sub-klasifikasi pelatihan tidak valid.',
            'qualification_training_id.required' => 'Kualifikasi pelatihan harus diisi.',
            'qualification_training_id.exists' => 'Kualifikasi pelatihan tidak valid.',
            'qualification_level_training_id.required' => 'Tingkat kualifikasi pelatihan harus diisi.',
            'qualification_level_training_id.exists' => 'Tingkat kualifikasi pelatihan tidak valid.',
            'name.required' => 'Nama pelatihan harus diisi.',
            'name.max' => 'Nama pelatihan tidak boleh lebih dari :max karakter.',
            'organizer.required' => 'Penyelenggara harus diisi.',
            'organizer.max' => 'Penyelenggara tidak boleh lebih dari :max karakter.',
            'start_at.required' => 'Tanggal mulai harus diisi.',
            'start_at.before' => 'Tanggal mulai harus sebelum tanggal selesai.',
            'start_at.date' => 'Format tanggal mulai tidak valid.',
            'end_time.required' => 'Tanggal selesai harus diisi.',
            'end_time.date' => 'Format tanggal selesai tidak valid.',
            'lesson_hour.required' => 'Jam pelajaran harus diisi.',
            'lesson_hour.integer' => 'Jam pelajaran harus berupa angka.',
            'lesson_hour.max' => 'Jam pelajaran tidak boleh lebih dari :max.',
            'lesson_hour.min' => 'Jam pelajaran tidak boleh kurang dari :min.',
            'location.required' => 'Lokasi pelatihan harus diisi.',
            'location.max' => 'Lokasi pelatihan tidak boleh lebih dari :max karakter.',
            'description.required' => 'Deskripsi harus diisi.',
            'description.max' => 'Deskripsi tidak boleh lebih dari :max karakter.',
        ];
    }
}
