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
            'phone_number' => 'required|unique:users,phone_number',
            'type_of_business_entity' => ['required', new TypeOfBussinessEntityRule]
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
            'name.required' => 'Nama wajib di isi',
            'name.max' => 'Nama maksimal :max karakter',
            'association_id.required' => 'Asosiasi wajib di isi',
            'association_id.exists' => 'Asosisasi tidak ditemukan',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Email harus valid',
            'email.max' => 'Email maksimal :max karakter',
            'password.required' => 'Password wajib di isi',
            'password.same' => 'Password harus sama',
            'password_confirmation.required' => 'Konfirmasi password harus di isi',
            'phone_number.required' => 'No telepon wajib di isi',
            'phone_number.unique' => 'No telepon sudah digunakan',
        ];
    }
}
