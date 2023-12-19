<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'executor_id' => 'required|exists:service_providers,id',
            'consultant_id' => 'required|exists:service_providers,id',
            'fund_source_id' => 'required|exists:fund_sources,id',
            'contract_category_id' => 'required|exists:contract_categories,id',
            'name' => 'required|max:255',
            'physical_progress' => 'required|numeric|between:0,100',
            'project_value' => 'required|integer',
            'characteristic_project' => 'required',
            'physical_progress_start' => 'nullable|date',
            'finance_progress_start' => 'nullable|date',
            'year' => 'min:4|max:4',
            'start_at' => 'required|before:end_at|date',
            'end_at' => 'required|date',
            'status' => 'required'
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
            'consultant_id.required' => 'Konsultan harus diisi.',
            'consultant_id.exists' => 'Konsultan tidak valid.',
            'executor_id.required' => 'Pelaksana harus diisi.',
            'executor_id.exists' => 'Pelaksana tidak valid.',
            'fund_source_id.required' => 'Sumber dana harus diisi.',
            'fund_source_id.exists' => 'Sumber dana tidak valid.',
            'contract_category_id.required' => 'Kategori kontrak harus diisi.',
            'contract_category_id.exists' => 'Kategori kontrak tidak valid.',
            'name.required' => 'Nama proyek harus diisi.',
            'name.max' => 'Nama proyek tidak boleh lebih dari :max karakter.',
            'project_value.required' => 'Nilai proyek harus diisi.',
            'project_value.integer' => 'Nilai proyek harus berupa angka.',
            'characteristic_project.required' => 'Karakteristik proyek harus diisi.',
            'physical_progress_start.date' => 'Format tanggal awal progres fisik tidak valid.',
            'finance_progress_start.date' => 'Format tanggal awal progres keuangan tidak valid.',
            'year.min' => 'Tahun harus terdiri dari minimal :min karakter.',
            'year.max' => 'Tahun tidak boleh lebih dari :max karakter.',
            'start_at.required' => 'Tanggal mulai harus diisi.',
            'start_at.before' => 'Tanggal mulai harus sebelum tanggal selesai.',
            'start_at.date' => 'Format tanggal mulai tidak valid.',
            'end_at.required' => 'Tanggal selesai harus diisi.',
            'end_at.date' => 'Format tanggal selesai tidak valid.',
            'status.required' => 'Status proyek harus diisi.',
        ];
    }
}
