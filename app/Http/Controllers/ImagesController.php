<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ImageInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\VideoRequest;
use App\Models\Image;
use App\Services\ImageService;
use App\Services\VideoService;
use App\Traits\PaginationTrait;

class ImagesController extends Controller
{
    use PaginationTrait;

    private ImageInterface $image;
    private ImageService $service;
    private VideoService $videoService;
    public function __construct(ImageInterface $image, ImageService $service, VideoService $videoService)
    {
        $this->image = $image;
        $this->service = $service;
        $this->videoService = $videoService;
    }

    /**
     * update
     *
     * @return void
     */
    public function store(ImageRequest $request, Image $image)
    {
        $this->service->update($request, $image);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * storeVideo
     *
     * @param  mixed $request
     * @param  mixed $image
     * @return void
     */
    public function storeVideo(VideoRequest $request, Image $image)
    {
        $this->videoService->update($request, $image);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }
}
