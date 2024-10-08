<?php

namespace App\Contracts\Repositories;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\FaqInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class FaqRepository extends BaseRepository implements FaqInterface
{
    public function __construct(Faq $faq)
    {
        $this->model = $faq;
    }

    /**
     * search
     *
     * @param  mixed $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->withCount('projects')
            ->with('user', 'projects')
            ->orderByDesc('created_at')
            ->get();
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
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->orderByDesc('created_at')
            ->get();
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
            ->when($request->name,function($query) use ($request){
                $query->where('question','LIKE','%'.$request->name.'%');
            })
            ->orderByDesc('created_at')
            ->fastPaginate($pagination);
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
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)->delete($id);
    }
}
