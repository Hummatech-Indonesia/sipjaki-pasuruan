<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ServiceProviderRequest;
use App\Traits\UploadTrait;

class ServiceProviderService
{
    use UploadTrait;

    /**
     * update
     *
     * @param  mixed $request
     * @return array
     */
    public function update(ServiceProviderRequest $request,$file): array
    {
        $data = $request->validated();
        $old_file = $file;
        if (isset($data['file'])) {
            if ($old_file) {
                if ($request->hasFile('file')) {
                    $this->remove($old_file);
                    $old_file = $this->upload(UploadDiskEnum::SERVICEPROVIDER->value, $request->file('file'));
                }
            } else {
                $old_file = $this->upload(UploadDiskEnum::SERVICEPROVIDER->value, $request->file('file'));
            }
        }
        $data['file'] = $old_file;
        return $data;
    }
}
