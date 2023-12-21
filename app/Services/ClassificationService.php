<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ClassificationRequest;
use App\Http\Requests\ClassificationUpdateRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Http\Requests\QualificationRequest;
use App\Http\Requests\QualificationUpdateRequest;
use App\Models\Classification;
use App\Models\News;
use App\Models\Qualification;
use App\Traits\UploadTrait;

class ClassificationService
{

    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @return array
     */
    public function store(ClassificationRequest $request): array
    {
        $data = $request->validated();
        return [
            'file' => $this->upload(UploadDiskEnum::CLASSIFICATION->value, $request->file('file')),
            'name' => $data['name'],
        ];
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $news
     * @return array
     */
    public function update(ClassificationUpdateRequest $request, Classification $classification): array
    {
        $data = $request->validated();
        $old_file = $classification->file;
        if ($request->hasFile('file')) {
            $this->remove($old_file);
            $old_file = $this->upload(UploadDiskEnum::CLASSIFICATION->value, $request->file('file'));
        }
        return [
            'name' => $data['name'],
            'file' => $old_file,
        ];
    }
}
