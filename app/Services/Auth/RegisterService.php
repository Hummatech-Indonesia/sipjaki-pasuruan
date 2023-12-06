<?php

namespace App\Services\Auth;

use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;

class RegisterService
{
    /**
     * Handle school registration form
     *
     * @param RegisterRequest $request
     * @param RegisterInterface $register
     * @return void
     */

    public function handleRegistration(RegisterRequest $request, RegisterInterface $register): void
    {
        $data = $request->validated();
        $password = bcrypt($data['password']);

        $user = $register->store([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'phone_number' => $data['phone_number'],
        ]);

        Mail::to($data['email'])->send(new RegistrationMail(['email' => $request->email, 'user' => $request->name]));

        $user->assignRole(RoleEnum::SERVICE_PRODIVER);
        auth()->attempt(['email' => $user['email'], 'password' => $password]);
    }
}
