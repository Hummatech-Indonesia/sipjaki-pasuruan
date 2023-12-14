<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DinasRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'section_id' => 'required|exists:sections,id',
            'type_id' => 'required|exists:types,id',
            'field_id' => 'required|array',
            'position' => 'required',
            'name_official' => 'required|max:255',
            'email_official' => 'required|email|max:255',
            'field_id.*' => 'exists:fields,id',
            'address' => 'required',
            'mobile_phone_number' => 'required|numeric',
            'echelon' => 'required|max:4',
            'local_regulation' => 'required|max:255',
            'number_local_regulation' => 'required|max:255',
            'sk_tpjk' => 'required|max:255',
            'number_sk_tpjk' => 'required|max:255',
            'admin_sipjaki' => 'required|max:255',
            'number_sk_sipjaki' => 'required|max:255',
            'activity' => 'required|max:255',
            'last_year_budget' => 'required|max:10',
            'budget_this_year' => 'required|max:10',
            'sturucture_organization_file' => 'required|mimes:png,jpg,jpeg'
        ];
    }
}
