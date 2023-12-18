<?php


namespace App\Traits;


trait ValidationAssociationTrait
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules(): array
    {
        return [
            'nama' => 'required|max:255',
            'email' => 'required|max:255|email|unique',
            'alamat' => 'required',
            'email_ketua_asosiasi' => 'required|max:255|email|unique',
            'kota' => 'required',
            'kode_pos' => 'required',
            'nomor_hp' => 'required|numeric',
            'nama_ketua' => 'required',
            'alamat_ketua' => 'required',
            'nomor_hp_ketua' => 'required|numeric'
        ];
    }


    /**
     * Custom Validation Messages
     *
     * @return array<string, mixed>
     */

    public function customValidationMessages()
    {
        return [
            'nama.required' => 'Kolom Nama wajib diisi.',
            'nama.max' => 'Kolom Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Kolom Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan. Harap gunakan email lain.',
            'email.max' => 'Kolom Email tidak boleh lebih dari 255 karakter.',
            'email.email' => 'Format Email tidak valid.',
            'alamat.required' => 'Kolom Alamat wajib diisi.',
            'kota.required' => 'Kota wajib diisi',
            'kode_pos.required' => 'Kode Pos wajib diisi',
            'nomor_hp.required' => 'Nomor HP wajib diisi',
            'nomor_hp.numeric' => 'Nomor HP yang anda inputkan tidak valid',
            'nama_ketua.required' => 'Nama Ketua wajib diisi',
            'alamat_ketua.required' => 'Alamat ketua wajib diisi',
            'nomor_hp_ketua.required' => 'Nomor HP Ketua wajib diisi',
            'nomor_hp_ketua.numeric' => 'Nomor HP Ketua tidak valid'
        ];
    }
}
