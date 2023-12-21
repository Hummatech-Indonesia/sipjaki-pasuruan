<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\NewsInterface;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsRepository extends BaseRepository implements NewsInterface
{
    public function __construct(News $news)
    {
        $this->model = $news;
    }

    /**
     * displayLatestNews
     *
     * @param  mixed $request
     * @param  mixed $pagination
     * @return LengthAwarePaginator
     */
    public function displayLatestNews(Request $request, int $pagination = 3): LengthAwarePaginator
    {
        return $this->model->query()
            ->latest()
            ->fastPaginate($pagination);
    }

    /**
     * randomNews
     *
     * @return mixed
     */
    public function randomNews(): mixed
    {
        return $this->model->query()
            ->inRandomOrder()
            ->take(5)
            ->get();
    }

    /**
     * store
     *
     * @param  mixed $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)->delete($id);
    }


    /**
     * customPaginate
     *
     * @param  mixed $request
     * @param  mixed $pagination
     * @return LengthAwarePaginator
     */
    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->when($request->title,function($query) use ($request){
                $query->where('title','LIKE','%'.$request->title.'%');
            })
            ->orderByDesc('created_at')
            ->fastPaginate($pagination);
    }
}
