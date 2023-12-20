<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\TrainingMemberRequest;
use App\Http\Requests\TrainingMemberUpdateRequest;
use App\Models\Training;
use App\Models\TrainingMember;
use App\Traits\UploadTrait;

class TrainingMemberService
{
    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $training
     * @return array
     */
    public function store(TrainingMemberRequest $request, Training $training): array
    {
        $data = $request->validated();
        $data['training_id'] = $training->id;
        $data['file'] = $this->upload(UploadDiskEnum::TRAININGMEMBER->value, $request->file('file'));
        return $data;
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $trainingMember
     * @return array
     */
    public function update(TrainingMemberUpdateRequest $request, TrainingMember $trainingMember): array
    {
        $data = $request->validated();
        $old_file = $trainingMember->file;
        if ($request->hasFile('file')) {
            $this->remove($old_file);
            $old_file = $this->upload(UploadDiskEnum::TRAININGMEMBER->value, $request->file('file'));
        }
        $data['file'] = $old_file;
        return $data;
    }
}
