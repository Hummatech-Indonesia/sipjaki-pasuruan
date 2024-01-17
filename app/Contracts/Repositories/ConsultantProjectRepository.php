<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;
use App\Models\ConsultantProject;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\Interfaces\ConsultantProjectInterface;

class ConsultantProjectRepository extends BaseRepository implements ConsultantProjectInterface
{
    public function __construct(ConsultantProject $consultantProject)
    {
        $this->model = $consultantProject;
    }

     /**
     * get
     *
     * @return mixed
     */
    public function get() : mixed
    {
        return $this->model->query()
            ->when(auth()->user()->dinas,function($query){
                $query->where('dinas_id',auth()->user()->dinas->id);
            })
            ->latest()
            ->get();
    }

    /**
     * get
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->where('project_id', $id)
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
     * customPaginate
     *
     * @param  mixed $request
     * @param  mixed $pagination
     * @return LengthAwarePaginator
     */
    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->when(auth()->user()->dinas, function ($query) {
                $query->where('dinas_id', auth()->user()->dinas->id);
            })
            ->when(auth()->user()->serviceProvider,function($query){
                $query->where('service_provider_id',auth()->user()->serviceProvider->id);
            })
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->year, function ($query) use ($request) {
                $query->where('fiscal_year_id', $request->year);
            })
            ->when($request->dinas_id, function ($query) use ($request) {
                $query->where('dinas_id', $request->dinas_id);
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
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
            ->with('serviceProviderProjects')
            ->when(auth()->user()->dinas, function ($query) {
                $query->whereRelation('dinas', 'dinas_id', auth()->user()->dinas->id);
            })
            ->when(auth()->user()->serviceProvider, function ($query) {
                $query->where('consultant_id', auth()->user()->serviceProvider->id);
                $query->orWhere('executor_id', auth()->user()->serviceProvider->id);
            })
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->year, function ($query) use ($request) {
                $query->whereYear('year', $request->year);
            })
            ->when($request->dinas_id, function ($query) use ($request) {
                $query->where('dinas_id', $request->dinas_id);
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->get();
    }
}
