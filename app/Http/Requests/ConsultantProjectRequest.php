<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantProjectRequest extends FormRequest
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
            'name' => 'required|string',
            'project_value' => 'required|integer',
            'characteristic_project' => 'required',
            'finance_progress_start' => 'nullable|date',
            'finance_progress' => 'nullable|integer|max:100',
            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            'start_at' => 'required|date',
            'end_at' => 'required|date',
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
            'service_provider_id.required' => 'Konsultan wajib diisi.',
            'service_provider_id.exists' => 'Konsultan yang dipilih tidak valid.',
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'project_value.required' => 'Nilai Proyek wajib diisi.',
            'project_value.integer' => 'Nilai Proyek harus berupa bilangan bulat.',
            'characteristic_project.required' => 'Karakteristik Proyek wajib diisi.',
            'characteristic_project.in' => 'karakteristik Proyek tidak valid.',
            'finance_progress_start.date' => 'Tanggal Awal Progres keuangan harus berupa tanggal yang valid.',
            'finance_progress.integer' => 'Progress Keuangan harus berupa bilangan bulat.',
            'fiscal_year_id.required' => 'Tahun wajib diisi.',
            'fiscal_year_id.exists' => 'Tahun tidak valid.',
            'start_at.required' => 'Tanggal mulai wajib diisi.',
            'start_at.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'end_at.required' => 'Tanggal selesai wajib diisi.',
            'end_at.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
        ];
    }
}
