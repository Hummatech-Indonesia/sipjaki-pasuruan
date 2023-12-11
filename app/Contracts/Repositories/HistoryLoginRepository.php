<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\HistoryLoginInterface;
use App\Models\HistoryLogin;
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

    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->when($request->name,function($query) use($request){
                $query->whereRelation('user','name','LIKE','%'.$request->name.'%');
            })
            ->fastPaginate($pagination);
    }
}
