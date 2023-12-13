<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\NewsRequest;
use App\Models\Image;
use App\Models\News;
use App\Traits\UploadTrait;

class ImageService
{

    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @return array
     */
    public function store(ImageRequest $request): array
    {
        $data = $request->validated();
        return [
            'photo' => $this->upload($data['categories'], $request->file('photo')),
            'categories' => $data['categories'],
        ];
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $image
     * @return array
     */
    public function update(ImageRequest $request, Image $image): array
    {
        $data = $request->validated();
        $old_photo = $image->photo;
        if ($old_photo) {
            if ($request->hasFile('photo')) {
                $this->remove($old_photo);
                $old_photo = $this->updateWithCustomName($data['categories'], $request->file('photo'), $data['categories']);
            }
        } else {
            $old_photo = $this->updateWithCustomName($data['categories'], $request->file('photo'), $data['categories']);
        }
        return [
            'categories' => $data['categories'],
            'photo' => $old_photo,
        ];
    }
}
