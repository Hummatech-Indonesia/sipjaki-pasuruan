<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\RuleInterface;
use App\Models\Rules;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RuleRepository extends BaseRepository implements RuleInterface
{
    public function __construct(Rules $rules)
    {
        $this->model = $rules;
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
            ->with('fiscalYear')
            ->when($request->name,function($query) use ($request){
                $query->where('name','LIKE','%'.$request->name.'%');
            })
            ->fastPaginate($pagination);
    }
}
