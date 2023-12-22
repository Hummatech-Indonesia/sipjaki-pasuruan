<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\WorkerCertificateRequest;
use App\Models\WorkerCertificate;
use App\Traits\UploadTrait;

class WorkerCertificateService
{
    use UploadTrait;
    /**
     * store
     *
     * @param  mixed $request
     * @return array
     */
    public function store(WorkerCertificateRequest $request): array
    {
        $data = $request->validated();
        $data['file'] = $this->upload(UploadDiskEnum::WORKER_CERTIFICATE->value, $request->file('file'));
        return $data;
    }
    /**
     * update
     *
     * @param  mixed $worker_certificate
     * @param  mixed $request
     * @return array
     */
    public function update(WorkerCertificate $worker_certificate, WorkerCertificateRequest $request): array
    {
        $data = $request->validated();
        $oldFile = $worker_certificate->file;
        if ($request->hasFile('file')) {
            $this->remove($oldFile);
            $oldFile = $this->upload(UploadDiskEnum::WORKER_CERTIFICATE->value, $request->file('file'));
        }
        $data['file'] = $oldFile;
        return $data;
    }
}
