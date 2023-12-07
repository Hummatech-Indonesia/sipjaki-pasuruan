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
            'sub_classification_id' => 'required|exists:sub_classifications,id',
            'qulification_level_id' => 'required|exists:qualification_levels,id',
            'name' => 'required|max:255',
            'start_at' => 'required|before:end_time|date',
            'end_time' => 'required|date',
            'lesson_hour' => 'integer|max:100|min:0',
            'location' => 'required|max:255',
            'description' => 'required|max:2048'
        ];
    }
}
