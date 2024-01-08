<?php

namespace App\Http\Requests;

use App\Rules\GenderRule;
use Illuminate\Foundation\Http\FormRequest;

class TrainingMemberRequest extends FormRequest
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
            'position' => 'required|max:255',
            'address' => 'required',
            'phone_number' => 'required',
            'decree' => 'nullable',
            'gender' => ['required', new GenderRule],
            'file' => 'required|mimes:pdf',
            'national_identity_number' => 'required|max:18',
            'education' => 'required',
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
            'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
            'position.required' => 'Posisi harus diisi.',
            'position.max' => 'Posisi tidak boleh lebih dari :max karakter.',
            'address.required' => 'Alamat harus diisi.',
            'phone_number.required' => 'Nomor telepon harus diisi.',
            'decree.required' => 'Surat keputusan harus diisi.',
            'gender.required' => 'Jenis kelamin harus diisi.',
            'file.required' => 'Sertifikat harus diunggah.',
            'file.mimes' => 'Sertifikat Harus Berekstensi PDF.',
            'national_identity_number.required' => 'Nomor identitas nasional harus diisi.',
            'national_identity_number.max' => 'Nomor identitas nasional tidak boleh lebih dari :max karakter.',
            'education.required' => 'Pendidikan harus diisi.',
        ];
    }
}
