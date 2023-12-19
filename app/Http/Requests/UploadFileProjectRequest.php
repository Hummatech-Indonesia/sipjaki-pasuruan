<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileProjectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'contract' => 'nullable|mimes:png,jpg,jpeg',
            'administrative_minutes' => 'nullable|mimes:png,jpg,jpeg',
            'report' => 'nullable|mimes:png,jpg,jpeg',
            'minutes_of_disbursement' => 'nullable|mimes:png,jpg,jpeg',
        ];
    }
}
