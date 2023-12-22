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
            'directur' => 'required|max:255',
            'city' => 'required|max:50',
            'postal_code' => 'required|max:10',
            'province' => 'required|max:255',
            'website' => 'required',
            'fax' => 'required',
            'file' => 'nullable|mimes:pdf,docx',
            'form_of_business_entity' => ['required', new FormOfBusinessEntityRule],
            'type_of_business_entity' => ['required', new TypeOfBussinessEntityRule]
        ];
    }

    /**
     * messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'directur.required' => 'Nama direktur wajib diisi',
            'directur.max' => 'Nama direktur maksimal 255 karakter',
            'name.required' => 'Nama perusahaan harus diisi.',
            'name.max' => 'Nama perusahaan tidak boleh lebih dari :max karakter.',
            'address.required' => 'Alamat perusahaan harus diisi.',
            'city.required' => 'Kota harus diisi.',
            'city.max' => 'Kota tidak boleh lebih dari :max karakter.',
            'postal_code.required' => 'Kode pos harus diisi.',
            'file.mimes' => 'File wajib berformat PDF ataupun Docx.',
            'postal_code.max' => 'Kode pos tidak boleh lebih dari :max karakter.',
            'province.required' => 'Provinsi harus diisi.',
            'province.max' => 'Provinsi tidak boleh lebih dari :max karakter.',
            'website.required' => 'Alamat website perusahaan harus diisi.',
            'fax.required' => 'Fax wajib diisi',
            'form_of_business_entity.required' => 'Bentuk badan usaha harus diisi.',
            'type_of_business_entity.required' => 'Jenis badan usaha harus diisi.',
        ];
    }
}
