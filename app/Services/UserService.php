<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Enums\UploadDiskEnum;
use App\Helpers\UserHelper;
use App\Http\Requests\UpdateProfileRequest;
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

    /**
     * updateProfile
     *
     * @return array
     */
    public function updateProfile(UpdateProfileRequest $request): array
    {
        $old_logo = UserHelper::getUserPhoto();

        $data = $request->validated();
        
        $folderName = auth()->user()->name;
        $folderPath = public_path('storage/' . UploadDiskEnum::PROFILE->value . '/' . $folderName);

        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        if ($request->hasFile('profile')) {
            if (!is_null($old_logo)) $this->remove($old_logo);
            $old_logo = $request->file('profile')->storeAs(UploadDiskEnum::PROFILE->value . '/' . $folderName, uniqid() . '.' . $request->file('profile')->getClientOriginalExtension(), 'public');
        }

        $data['profile'] = $old_logo;
        return $data;
    }
}
