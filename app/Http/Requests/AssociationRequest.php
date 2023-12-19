<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AssociationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', Rule::unique('associations', 'name')->ignore($this->association)],
            'email' => ['required', 'email', 'max:255', Rule::unique('associations', 'email')->ignore($this->association)],
            'email_leader' => ['required', 'max:255', Rule::unique('associations', 'email_leader')->ignore($this->association)],
            'address' => 'required',
            'city' => 'required|max:50',
            'postal_code' => 'required|max:10',
            'phone_number' => 'required|max:15',
            'leader' => 'required|max:255',
            'address_leader' => 'required|max:255',
            'phone_number_leader' => 'required|max:15',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'name.unique' => 'Nama sudah digunakan, pilih nama lain.',

            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email sudah digunakan, pilih email lain.',

            'email_leader.required' => 'Email pemimpin harus diisi.',
            'email_leader.max' => 'Email pemimpin tidak boleh lebih dari :max karakter.',
            'email_leader.unique' => 'Email pemimpin sudah digunakan, pilih email lain.',

            'address.required' => 'Alamat harus diisi.',
            'city.required' => 'Kota harus diisi.',
            'city.max' => 'Kota tidak boleh lebih dari :max karakter.',
            'postal_code.required' => 'Kode pos harus diisi.',
            'postal_code.max' => 'Kode pos tidak boleh lebih dari :max karakter.',
            'phone_number.required' => 'Nomor telepon harus diisi.',
            'phone_number.max' => 'Nomor telepon tidak boleh lebih dari :max karakter.',

            'leader.required' => 'Nama pemimpin harus diisi.',
            'leader.max' => 'Nama pemimpin tidak boleh lebih dari :max karakter.',
            'address_leader.required' => 'Alamat pemimpin harus diisi.',
            'address_leader.max' => 'Alamat pemimpin tidak boleh lebih dari :max karakter.',
            'phone_number_leader.required' => 'Nomor telepon pemimpin harus diisi.',
            'phone_number_leader.max' => 'Nomor telepon pemimpin tidak boleh lebih dari :max karakter.',
        ];
    }
}
