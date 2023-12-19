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
            'person_responsible' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|email|max:255',
            'name_opd' => 'required|max:255',
            'address' => 'required',
            'phone_number_opd' => 'numeric|required',
            'person_responsible' => 'required|max:255',
            'position' => 'required',
            'civil_servant_identity_number' => 'required'
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
            'name.required' => 'Nama harus diisi.',
            'phone_number.required' => 'Nomor telepon harus diisi.',
            'phone_number.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'name_opd.required' => 'Nama OPD harus diisi.',
            'name_opd.max' => 'Nama OPD tidak boleh lebih dari :max karakter.',
            'address.required' => 'Alamat harus diisi.',
            'phone_number_opd.numeric' => 'Nomor telepon OPD harus berupa angka.',
            'phone_number_opd.required' => 'Nomor telepon OPD harus diisi.',
            'person_responsible.required' => 'Nama yang bertanggung jawab harus diisi.',
            'person_responsible.max' => 'Nama yang bertanggung jawab tidak boleh lebih dari :max karakter.',
            'position.required' => 'Posisi harus diisi.',
            'civil_servant_identity_number.required' => 'Nomor identitas pegawai negeri sipil harus diisi.',
        ];
    }
}
