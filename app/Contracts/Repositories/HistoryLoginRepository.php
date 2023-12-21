<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HistoryLoginInterface;
use App\Models\HistoryLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HistoryLoginRepository extends BaseRepository implements HistoryLoginInterface
{
    public function __construct(HistoryLogin $historyLogin)
    {
        $this->model = $historyLogin;
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
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
            ->when($request->name,function($query) use($request){
                $query->whereRelation('user','name','LIKE','%'.$request->name.'%');
            })
            ->when($request->start_date, function ($query) use ($request) {
                $formatedDate = Carbon::parse($request->start_date)->format('Y-m-d') . ' 00:00:00';
                $query->where('created_at', '>=', $formatedDate);
            })
            ->when($request->end_date, function ($query) use ($request) {
                $formatedDate = Carbon::parse($request->end_date)->format('Y-m-d') . ' 00:00:00';
                $query->where('created_at', '<=', $formatedDate);
            })
            ->orderByDesc('created_at')
            ->fastPaginate($pagination);
    }

    public function clear() : mixed
    {
        return $this->model->query()
            ->delete();
    }
}
