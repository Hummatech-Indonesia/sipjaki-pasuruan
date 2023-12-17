<?php

namespace App\Http\Requests;

use App\Rules\FormOfBusinessEntityRule;
use App\Rules\TypeOfBussinessEntityRule;
use Illuminate\Foundation\Http\FormRequest;

class ServiceProviderRequest extends FormRequest
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
            'address' => 'required',
            'city' => 'required|max:50',
            'postal_code' => 'required|max:10',
            'province' => 'required|max:255',
            'website' => 'required',
            'form_of_business_entity' => ['required', new FormOfBusinessEntityRule],
            'type_of_business_entity' => ['required', new TypeOfBussinessEntityRule]
        ];
    }
}
