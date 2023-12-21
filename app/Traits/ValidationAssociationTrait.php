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
            'nama' => 'required|max:255|unique:associations,name',
            'email' => 'required|max:255|email|unique:associations,email',
            'alamat' => 'required',
            'email_ketua_asosiasi' => 'required|max:255|email|unique:associations,email_leader',
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
            'nama.required' => 'Kolom nama wajib diisi.',
            'nama.max' => 'Panjang nama tidak boleh melebihi 255 karakter.',
            'nama.unique' => 'Nama sudah digunakan, harap pilih nama lain.',

            'email.required' => 'Kolom email wajib diisi.',
            'email.max' => 'Panjang email tidak boleh melebihi 255 karakter.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan, harap gunakan email lain.',

            'alamat.required' => 'Kolom alamat wajib diisi.',

            'email_ketua_asosiasi.required' => 'Kolom email ketua asosiasi wajib diisi.',
            'email_ketua_asosiasi.max' => 'Panjang email ketua asosiasi tidak boleh melebihi 255 karakter.',
            'email_ketua_asosiasi.email' => 'Format email ketua asosiasi tidak valid.',
            'email_ketua_asosiasi.unique' => 'Email ketua asosiasi sudah digunakan, harap gunakan email lain.',

            'kota.required' => 'Kolom kota wajib diisi.',

            'kode_pos.required' => 'Kolom kode pos wajib diisi.',

            'nomor_hp.required' => 'Kolom nomor HP wajib diisi.',
            'nomor_hp.numeric' => 'Nomor HP harus berupa angka.',

            'nama_ketua.required' => 'Kolom nama ketua wajib diisi.',

            'alamat_ketua.required' => 'Kolom alamat ketua wajib diisi.',

            'nomor_hp_ketua.required' => 'Kolom nomor HP ketua wajib diisi.',
            'nomor_hp_ketua.numeric' => 'Nomor HP ketua harus berupa angka.',
        ];
    }
}
