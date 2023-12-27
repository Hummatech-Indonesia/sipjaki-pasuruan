<?php

namespace App\Services\Auth;

use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterService
{
    /**
     * Handle school registration form
     *
     * @param RegisterRequest $request
     * @param RegisterInterface $register
     * @return mixed
     */

    public function handleRegistration(RegisterRequest $request, RegisterInterface $register): mixed
    {
        $data = $request->validated();
        $password = bcrypt($data['password']);

        $token = strtoupper(Str::random(5));
        $user = $register->store([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'phone_number' => $data['phone_number'],
            'token' => $token,
            'expired_token' => now()->addMinutes('40')
        ]);

        $user->serviceProvider()->create($data);
        Mail::to($data['email'])->send(new RegistrationMail(['email' => $request->email, 'user' => $request->name, 'token' => $token, 'id' => $user->id]));

        $user->assignRole(RoleEnum::SERVICE_PRODIVER);
        $userEmail = User::where('email', $user->email)->first();
        return $userEmail->id;
    }
}
