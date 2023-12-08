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
            'service_provider_id' => 'required|exists:service_providers,id',
            'fund_source_id' => 'required|exists:fund_sources,id',
            'contract_category_id' => 'required|exists:contract_categories,id',
            'name' => 'required|max:255',
            'project_value' => 'required|integer',
            'characteristic_project' => 'required',
            'physical_progress_start' => 'required|date',
            'finance_progress_start' => 'required|date',
            'physical_progress' => 'required',
            'finance_progress' => 'required',
            'year' => 'min:4|max:4',
            'start_at' => 'required|before:end_at|date',
            'end_at' => 'required|date'
        ];
    }
}
