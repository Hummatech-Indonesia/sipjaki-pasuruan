<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Services\NewsService;
use App\Traits\PaginationTrait;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use PaginationTrait;
    private NewsInterface $news;
    private NewsService $service;

    public function __construct(NewsInterface $news, NewsService $service)
    {
        $this->news = $news;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = $this->news->customPaginate($request, $request->pagination);
        $data['paginate'] = $this->customPaginate($news->currentPage(), $news->lastPage());
        $data['data'] = NewsResource::collection($news);
        return ResponseHelper::success($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $this->news->store($this->service->store($request));
        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $news
     * @return void
     */
    public function update(NewsRequest $request, News $news)
    {
        $this->news->update($news->id, $request->validated());
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  mixed $news
     * @return void
     */
    public function destroy(News $news)
    {
        $this->news->delete($news->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
