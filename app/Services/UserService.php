<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Enums\UploadDiskEnum;
use App\Helpers\UserHelper;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
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
        $data['email_verified_at'] = now();
        $data['password'] = bcrypt($data['password']);
        $user = $user->store($data);
        $user->dinas()->create($data);
        $user->assignRole(RoleEnum::DINAS);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return array
     */
    public function update(UpdateUserRequest $request): array
    {
        $data = $request->validated();
        if ($data['password'] != null) {
            return [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'person_responsible' => $data['person_responsible'],
                'password' => bcrypt($data['password']),
            ];
        } else {
            return [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'person_responsible' => $data['person_responsible'],
            ];
        }
    }

    /**
     * updateProfile
     *
     * @return array
     */
    public function updateProfile(UpdateProfileRequest $request): array
    {
        $old_file = UserHelper::getUserPhoto();

        $data = $request->validated();

        if ($request->hasFile('profile')) {
            $destinationPath = $this->folderStorage(UserHelper::getUserName(), UploadDiskEnum::PROFILE->value);
            if ($old_file != null) $this->remove($old_file);
            $old_file = $request->file('profile')->store($destinationPath, 'public');
        }
        $data['profile'] = $old_file;
        return $data;
    }
}
