<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ServiceProviderQualificationRequest;
use App\Models\ServiceProviderQualification;
use App\Traits\UploadTrait;

class ServiceProviderQualificationService
{
    use UploadTrait;
    public function store(ServiceProviderQualificationRequest $request): array
    {
        $data = $request->validated();
        $file = $this->upload(UploadDiskEnum::QUALIFICATION->value, $request->file('file'));
        $data['file'] = $file;
        return $data;
    }

    /**
     * update
     *
     * @param  mixed $serviceProviderQualification
     * @param  mixed $request
     * @return array
     */
    public function update(ServiceProviderQualification $serviceProviderQualification, ServiceProviderQualificationRequest $request): array
    {
        $oldFile = $serviceProviderQualification->file;
        $data = $request->validated();
        if ($request->hasFile('file')) {
            $this->remove($oldFile);
            $oldFile = $this->upload(UploadDiskEnum::QUALIFICATION->value, $request->file('file'));
        }
        $data['file'] = $oldFile;
        return $data;
    }
}
