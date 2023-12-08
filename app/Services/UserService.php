<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
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
        $data['email_verified_at'] = now();
        $data['password'] = $password;
        $user = $user->store($data);
        $user->dinas()->create($data);
        $user->assignRole(RoleEnum::DINAS);
    }
}
