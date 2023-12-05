<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsInterface;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsInterface $news;
    public function __construct(NewsInterface $news)
    {
        $this->news = $news;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->news->search($request);
        return view('news.index', ['data' => $data]);
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
        $this->news->store($request->validated());
        return redirect()->back()->with('success', trans('alert.add_success'));
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
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  mixed $news
     * @return void
     */
    public function destroy(News $news)
    {
        $this->news->delete($news->id);
        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
