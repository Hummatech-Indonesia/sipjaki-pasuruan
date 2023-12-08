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
            'dinas' => 'required|max:255',
            'field_id' => 'required|exists:fields,id',
            'type' => 'required|max:4',
            'sections' => 'required|max:255',
            'address' => 'required',
            'phone_number' => 'required|max:255',
            'echelon' => 'required|max:4',
            'local_regulation' => 'required|max:255',
            'number_local_regulation' => 'required|max:255',
            'sk_tpjk' => 'required|max:255',
            'number_sk_tpjk' => 'required|max:255',
            'admin_sipjaki' => 'required|max:255',
            'number_sk_sipjaki' => 'required|max:255',
            'activity' => 'nullable|max:255',
            'last_year_budget' => 'required|max:10',
            'budget_this_year' => 'required|max:10'
        ];
    }
}
