<?php

namespace App\Services;

use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Traits\UploadTrait;

class NewsService
{

    use UploadTrait;

    /**
     * store
     *
     * @param  mixed $request
     * @return array
     */
    public function store(NewsRequest $request): array
    {
        $data = $request->validated();
        return [
            'title' => $data['title'],
            'thumbnail' => $this->upload(UploadDiskEnum::THUMBNAIL->value, $request->file('thumbnail')),
            'content' => $data['content']
        ];
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $news
     * @return array
     */
    public function update(NewsUpdateRequest $request, News $news): array
    {
        $data = $request->validated();
        $old_thumbnail = $news->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $this->remove($old_thumbnail);
            $old_thumbnail = $this->upload(UploadDiskEnum::THUMBNAIL->value, $request->file('thumbnail'));
        }
        return [
            'title' => $data['title'],
            'thumbnail' => $old_thumbnail,
            'content' => $data['content']
        ];
    }
}
