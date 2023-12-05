<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\UserRequest;
use App\Traits\UploadTrait;

class UserService
{
    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @return array
     */
    public function store(UserRequest $request, UserInterface $user)
    {
        $data = $request->validated();
        $password = bcrypt('password');

        $user = $user->store([
            'name' => $data['name'],
            'password' => $password,
            'email_verified_at' => now(),
            'email' => $data['email'],
            'dinas' => isset($data['dinas']) ? $data['dinas'] : null
        ]);
        $user->assignRole($data['role']);
    }
}
