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
            'qualification_level_id' => 'required|exists:qualification_levels,id',
            'name' => 'required|max:255',
            'organizer' => 'required|max:255',
            'start_at' => 'required|before:end_time|date',
            'end_time' => 'required|date',
            'lesson_hour' => 'required|integer|max:100|min:0',
            'location' => 'required|max:255',
            'description' => 'required|max:2048'
        ];
    }
}
