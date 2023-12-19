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
            'contract' => 'required|mimes:png,jpg,jpeg',
            'administrative_minutes' => 'required|mimes:png,jpg,jpeg',
            'report' => 'required|mimes:png,jpg,jpeg',
            'minutes_of_disbursement' => 'required|mimes:png,jpg,jpeg',
        ];
    }
}
