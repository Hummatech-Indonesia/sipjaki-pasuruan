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
            'field_id' => 'required|exists:fields,id',
            'type' => 'required|max:4',
            'sections' => 'required|exists:sections,id',
            'address' => 'required',
            'phone_number' => 'required|max:255',
            'echelon' => 'required|max:4',
            'local_regulation' => 'required|max:255',
            'number_local_regulation' => 'required|max:255',
            'sk_tpjk' => 'required|max:255',
            'number_sk_tpjk' => 'required|max:255',
            'admin_sipjaki' => 'required|max:255',
            'number_sk_sipjaki' => 'required|max:255',
            'activity' => 'required|max:255',
            'last_year_budget' => 'required|max:10',
            'budget_this_year' => 'required|max:10'
        ];
    }
}
