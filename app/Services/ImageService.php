<?php

namespace App\Services;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Storage;

class ImageService
{

    /**
     * uploadImageSummernote
     *
     * @param  mixed $request
     * @return void
     */
    public function uploadImageSummernote(ImageRequest $request): array
    {
        $data = $request->validated();

        $domQuestion = new \DOMDocument();
        libxml_use_internal_errors(true);
        $domQuestion->loadHTML($data['photo'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        $this->processImages($domQuestion, $data['categories']);
        libxml_clear_errors();

        return [
            'photo' => $domQuestion->saveHTML(),
            'categories' => $data['categories']
        ];
    }

    /**
     * processImages
     *
     * @param  mixed $dom
     * @param  mixed $storage
     * @return void
     */
    private function processImages(\DOMDocument $dom, $storage)
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

                Storage::put($storage . '/' . $filepath, $imageData);

                $new_src = asset($storage . '/' . $filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
                $img->setAttribute('class', 'img-responsive');
            }
        }
    }
}
