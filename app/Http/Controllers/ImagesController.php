<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ImageInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use App\Services\ImageService;
use App\Traits\PaginationTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * index
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse|View
    {
        $images = $this->image->customPaginate($request, 10);

        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($images->currentPage(), $images->lastPage());
            $data['data'] = ImageResource::collection($images);
            return ResponseHelper::success($data);
        } else {
            return view('pages.news', ['images' => $images]);
        }
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ImageRequest $request)
    {
        $this->image->store($this->service->store($request));
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function update(ImageRequest $request, Image $image)
    {
        $this->image->update($image->id, $this->service->update($request, $image));
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * destroy
     *
     * @param  mixed $image
     * @return void
     */
    public function destroy(Image $image, Request $request)
    {
        $this->image->delete($image->id);
        $this->service->remove($image->photo);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
