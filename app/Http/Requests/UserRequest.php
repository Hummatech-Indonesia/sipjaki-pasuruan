<?php

namespace App\Http\Requests;

use App\Rules\RoleRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
            'field_id' => 'nullable|exists:fields,id',
            'type' => 'nullable|max:4',
            'sections' => 'nullable|max:255',
            'address' => 'nullable',
            'phone_number' => 'nullable|max:255',
            'echelon' => 'nullable|max:4',
            'local_regulation' => 'nullable|max:255',
            'number_local_regulation' => 'nullable|max:255',
            'sk_tpjk' => 'nullable|max:255',
            'number_sk_tpjk' => 'nullable|max:255',
            'admin_sipjaki' => 'nullable|max:255',
            'number_sk_sipjaki' => 'nullable|max:255',
            'activity' => 'nullable|max:255',
            'last_year_budget' => 'nullable|max:10',
            'budget_this_year' => 'nullable|max:10'
        ];
    }
}
