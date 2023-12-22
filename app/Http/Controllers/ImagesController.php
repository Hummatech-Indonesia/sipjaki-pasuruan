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
    public function __construct(ImageInterface $image, ImageService $service)
    {
        $this->image = $image;
        $this->service = $service;
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
}
