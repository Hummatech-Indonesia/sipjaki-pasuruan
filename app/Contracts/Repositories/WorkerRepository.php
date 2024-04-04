<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\WorkerInterface;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class WorkerRepository extends BaseRepository implements WorkerInterface
{
    public function __construct(Worker $worker)
    {
        $this->model = $worker;
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
            ->when(auth()->user()?->serviceProvider,function($query){
                $query->where('service_provider_id',auth()->user()->serviceProvider->id);
            })
            ->get();
    }

    /**
     * getByServiceProvider
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getByServiceProvider(Request $request): mixed
    {
        return $this->model->query()
            ->where('service_provider_id', auth()->user()->serviceProvider?->id)
            ->get();
    }

    /**
     * countWorker
     *
     * @return int
     */
    public function countWorker(): int
    {
        return $this->model->query()
            ->where('service_provider_id', auth()->user()->serviceProvider?->id)
            ->count();
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

    /**
     * deleteMultiple
     *
     * @param  mixed $data
     * @return mixed
     */
    public function deleteMultiple(array $data): mixed
    {
        return $this->model->query()
            ->whereIn('id', $data)
            ->delete();
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
            ->where('service_provider_id', auth()->user()->serviceProvider->id)
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })

            ->fastPaginate($pagination);
    }
}
