<?php

namespace App\Traits;

use App\Rules\GenderRule;
use Illuminate\Validation\Rule;

trait ValidationTrainingMemberTrait
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
            'posisi' => 'required|max:255',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'surat_keputusan' => 'required',
            'jenis_kelamin' => 'required',
            'nik' => ['required', 'max:18', Rule::unique('training_members', 'national_identity_number')],
            'edukasi' => 'required',
            'surat_keputusan' => 'required',
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
            'nomor_hp.required' => 'Kolom Nomor HP wajib diisi.',
            'jenis_kelamin.required' => 'Kolom Jenis Kelamin wajib diisi.',
            'agama.required' => 'Kolom Agama wajib diisi.',
            'agama.custom' => 'Agama yang dipilih tidak valid.',
            'status.required' => 'Kolom Status wajib diisi.',
        ];
    }
}
