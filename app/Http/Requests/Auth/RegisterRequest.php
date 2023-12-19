<?php

namespace App\Http\Requests\Auth;

use App\Rules\TypeOfBussinessEntityRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'association_id' => 'required|exists:associations,id',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
            'phone_number' => 'required',
            'type_of_business_entity' => ['required', new TypeOfBussinessEntityRule]
        ];
    }
}
