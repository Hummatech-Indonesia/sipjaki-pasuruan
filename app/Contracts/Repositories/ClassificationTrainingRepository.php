<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ClassificationTrainingInterface;
use App\Models\ClassificationTraining;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ClassificationTrainingRepository extends BaseRepository implements ClassificationTrainingInterface
{

    public function __construct(ClassificationTraining $classificationTraining)
    {
        $this->model = $classificationTraining;
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
            ->orderByDesc('created_at')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'. $request->name .'%');
            })
            ->fastPaginate($pagination);
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
            ->orderByDesc('created_at')
            ->when($request->classification,function($query) use ($request){
                $query->whereRelation('classificationTraining','id',$request->classification);
            })
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'. $request->name .'%');
            })
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
        return $this->show($id)
            ->update($data);
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)
            ->delete();
    }
}
