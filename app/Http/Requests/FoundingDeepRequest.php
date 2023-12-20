<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoundingDeepRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'deed_number' => 'required|max:255',
            'notary_name' => 'required|max:255',
            'address' => 'required',
            'city' => 'required|max:255',
            'province' => 'required|max:255',
            'deed_date' => 'required|date'
        ];
    }

    /**
     * messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'deed_number.required' => 'Nomor perbuatan harus diisi.',
            'deed_number.max' => 'Nomor perbuatan tidak boleh melebihi 255 karakter.',
            'notary_name.required' => 'Nama notaris harus diisi.',
            'notary_name.max' => 'Nama notaris tidak boleh melebihi 255 karakter.',
            'address.required' => 'Alamat harus diisi.',
            'city.required' => 'Kota harus diisi.',
            'city.max' => 'Kota tidak boleh melebihi 255 karakter.',
            'province.required' => 'Provinsi harus diisi.',
            'province.max' => 'Provinsi tidak boleh melebihi 255 karakter.',
            'deed_date.required' => 'Tanggal perbuatan harus diisi.',
            'deed_date.date' => 'Tanggal perbuatan harus berformat tanggal yang valid.',
        ];

    }
}
