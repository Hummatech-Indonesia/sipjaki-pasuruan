<?php

namespace App\Contracts\Repositories;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\ProjectInterface;
use App\Enums\StatusEnum;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectRepository extends BaseRepository implements ProjectInterface
{
    public function __construct(Project $project)
    {
        $this->model = $project;
    }

    /**
     * getAllProject
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getAllProject(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->get();
    }

    /**
     * countAllProject
     *
     * @return int
     */
    public function countAllProject(): int
    {
        return $this->model->query()
            // ->where('service_provider_id', auth()->user()->serviceProvider ? auth()->user()->serviceProvider->id : auth()->user()->dinas->id)
            ->count();
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
            // ->where('service_provider_id', auth()->user()->serviceProvider->id)
            ->where('status', StatusEnum::ACTIVE->value)
            ->when($request->year, function ($query) use ($request) {
                $query->where('year', $request->year);
            })
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->year, function ($query) use ($request) {
                $query->whereYear('date', $request->year);
            })
            ->get();
    }

    /**
     * countProject
     *
     * @return int
     */
    public function countProject(): int
    {
        return $this->model->query()
            // ->where('service_provider_id', auth()->user()->serviceProvider->id)
            ->where('status', StatusEnum::ACTIVE->value)
            ->count();
    }

    /**
     * countDinas
     *
     * @return int
     */
    public function countDinas(): int
    {
        return $this->model->query()
            ->where('dinas_id', auth()->user()->dinas->id)
            ->count();
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()->whereRelation('dinas', 'dinas_id', auth()->user()->dinas->id)
            ->with('serviceProviderProjects')
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
            ->with('serviceProviderProjects')
            ->when(auth()->user()->dinas, function ($query) {
                $query->whereRelation('dinas', 'dinas_id', auth()->user()->dinas->id);
            })
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->year, function ($query) use ($request) {
                $query->whereYear('date', $request->year);
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->fastPaginate($pagination);
    }

    /**
     * serviceProviderProject
     *
     * @param  mixed $request
     * @param  mixed $pagination
     * @return LengthAwarePaginator
     */
    public function serviceProviderProject(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->with('serviceProviderProjects')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->fastPaginate($pagination);
    }


    /**
     * getbyId
     *
     * @return mixed
     */
    public function getbyId(Request $request): mixed
    {
        return $this->model->query()
            ->where(['status' => 'active', 'dinas_id' => auth()->user()->dinas->id])
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->name.'%');
            })
            ->get();
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
            ->count();
    }

    /**
     * countActiveProject
     *
     * @return int
     */
    public function countActiveProject(): int
    {
        return $this->model->query()
            ->where('status', StatusEnum::ACTIVE->value)
            ->count();
    }

    /**
     * historyConsultan
     *
     * @return mixed
     */
    public function historyConsultan(): mixed
    {
        return $this->model->query()
            ->where('date_finish' <= now()->format('Y-m-d H:i:s'))
            ->where('consultant_id', auth()->user()->serviceProvider->id)
            ->get();
    }

    /**
     * historyExecutor
     *
     * @return mixed
     */
    public function historyExecutor(): mixed
    {
        return $this->model->query()
            ->where('date_finish' <= now()->format('Y-m-d H:i:s'))
            ->where('executor_id', auth()->user()->serviceProvider->id)
            ->get();
    }

    /**
     * projectConsultan
     *
     * @return mixed
     */
    public function projectConsultan(): mixed
    {
        return $this->model->query()
            ->where('consultant_id', auth()->user()->serviceProvider->id)
            ->get();
    }

    /**
     * projectExecutor
     *
     * @return mixed
     */
    public function projectExecutor(): mixed
    {
        return $this->model->query()
            ->where('executor_id', auth()->user()->serviceProvider->id)
            ->get();
    }

}
