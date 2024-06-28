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
            'project_value' => 'nullable|integer',
            'characteristic_project' => 'required',
            'status' => 'required',
            'finance_progress_start' => 'nullable|date',
            'finance_progress' => 'nullable|numeric|max:100',
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
            'service_provider_id.required' => 'Konsultan wajib diisi.',
            'service_provider_id.exists' => 'Konsultan yang dipilih tidak valid.',
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'project_value.integer' => 'Nilai Proyek harus berupa bilangan bulat.',
            'characteristic_project.required' => 'Karakteristik Proyek wajib diisi.',
            'finance_progress_start.date' => 'Tanggal Awal Progres Keuangan harus berupa tanggal yang valid.',
            'finance_progress.integer' => 'Progress Keuangan harus berupa bilangan bulat.',
            'finance_progress.max' => 'Progress Keuangan tidak boleh lebih dari 100.',
            'fiscal_year_id.required' => 'Tahun wajib diisi.',
            'fiscal_year_id.exists' => 'Tahun yang dipilih tidak valid.',
            'start_at.date' => 'Tanggal Mulai harus berupa tanggal yang valid.',
            'start_at.before_or_equal' => 'Tanggal Mulai harus sama atau sebelum Tanggal Selesai.',
            'end_at.date' => 'Tanggal Selesai harus berupa tanggal yang valid.',
            'end_at.after_or_equal' => 'Tanggal Selesai harus sama atau setelah Tanggal Mulai.',
        ];
    }
}
