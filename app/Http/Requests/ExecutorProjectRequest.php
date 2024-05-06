<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExecutorProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fund_source_id' => 'required|exists:fund_sources,id',
            'contract_category_id' => 'required|exists:contract_categories,id',
            'service_provider_id' => 'required|exists:service_providers,id',
            'consultant_project_id' => 'required|exists:consultant_projects,id',
            'name' => 'required|string',
            'project_value' => 'nullable|integer',
            'characteristic_project' => 'required',
            'finance_progress_start' => 'nullable|date',
            'finance_progress' => 'required|numeric|max:100',
            'physical_progress_start' => 'nullable|date',
            'physical_progress' => 'required|numeric|max:100',
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'start_at' => 'nullable|date|before_or_equal:end_at',
            'end_at' => 'nullable|date|after_or_equal:start_at',
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
            'fund_source_id.required' => 'Sumber Dana wajib diisi.',
            'fund_source_id.exists' => 'Sumber Dana yang dipilih tidak valid.',
            'contract_category_id.required' => 'Kategori Kontrak wajib diisi.',
            'contract_category_id.exists' => 'Kategori Kontrak yang dipilih tidak valid.',
            'service_provider_id.required' => 'Pelaksana wajib diisi.',
            'service_provider_id.exists' => 'Pelaksana yang dipilih tidak valid.',
            'consultant_project_id.required' => 'Paket Konsultan wajib diisi.',
            'consultant_project_id.exists' => 'Paket Konsultan yang dipilih tidak valid.',
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'project_value.integer' => 'Nilai Proyek harus berupa bilangan bulat.',
            'characteristic_project.required' => 'Karakteristik Proyek wajib diisi.',
            'finance_progress_start.date' => 'Tanggal Awal Progres keuangan harus berupa tanggal yang valid.',
            'finance_progress.integer' => 'Progress Keuangan harus berupa bilangan bulat.',
            'physical_progress_start.date' => 'Tanggal Awal Progres Fisik harus berupa tanggal yang valid.',
            'physical_progress.integer' => 'Progress Fisik harus berupa bilangan bulat.',
            'physical_progress.required' => 'Progress Fisik harus diisi.',
            'fiscal_year_id.required' => 'Tahun wajib diisi.',
            'fiscal_year_id.exists' => 'Tahun tidak valid.',
            'start_at.before_or_equal' => 'Tanggal mulai harus sama atau sebelum tanggal selesai.',
            'end_at.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
        ];
    }
}
