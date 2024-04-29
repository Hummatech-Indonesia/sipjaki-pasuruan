<?php

namespace App\Services;

use App\Models\News;
use App\Traits\UploadTrait;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NewsUpdateRequest;

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
        $thumbnail = $request->file('thumbnail')->store(UploadDiskEnum::THUMBNAIL->value, 'public');

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($data['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        $this->processImages($dom);

        libxml_clear_errors();
        return [
          'title' => $data['title'],
          'thumbnail' => $thumbnail,
          'content' => $dom->saveHTML()
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


    private function processImages(\DOMDocument $dom)
    {
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('#data:image/#', $src)) {
                preg_match('#data:image/(?<mime>.*?)\;#', $src, $groups);
                $mimetype = $groups['mime'];
                $fileNameContent = uniqid();
                $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                $filepath = $fileNameContentRand . '.' . $mimetype;

                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $src));

                Storage::put(UploadDiskEnum::CONTENT->value . '/' . $filepath, $imageData);

                $new_src = Storage::url(UploadDiskEnum::CONTENT->value . '/' . $filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }
    }
}
