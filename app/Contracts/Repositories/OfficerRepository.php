<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\OfficerInterface;
use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OfficerRepository extends BaseRepository implements OfficerInterface
{
    public function __construct(Officer $officer) {
        $this->model = $officer;
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
                $query->where('name', 'LIKE', '%'. $request->name .'%');
            })
            ->when(auth()->user()?->serviceProvider,function($query){
                $query->where('service_provider_id',auth()->user()->serviceProvider->id);
            })
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
            ->where('service_provider_id', auth()->user()->serviceProvider->id)
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'. $request->name .'%');
            })
            ->fastPaginate($pagination);
    }
    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->when(auth()->user()->serviceProvider, function ($query) {
                $query->where('service_provider_id', auth()->user()->serviceProvider->id);
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
     * update
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return mixed
     */
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
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
        return $this->model->query()
            ->findOrFail($id)
            ->delete();
    }

    /**
     * count
     *
     * @param  mixed $data
     * @return int
     */
    public function count(?array $data): int
    {
        return $this->model->query()
            ->where('service_provider_id', auth()->user()->serviceProvider?->id)
            ->count();
    }
}
