<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ServiceProviderProjectInterface;
use App\Models\ServiceProviderProject;
use Illuminate\Http\Request;

class ServiceProviderProjectRepository extends BaseRepository implements ServiceProviderProjectInterface
{
    public function __construct(ServiceProviderProject $serviceProviderProject)
    {
        $this->model = $serviceProviderProject;
    }

    /**
     * getByProject
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByProject(mixed $id): mixed
    {
        return $this->model->query()
            ->with('project')
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
     * search
     *
     * @param  mixed $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->where('project_id', $request->project_id)
            ->where('service_provider_id', auth()->user()->serviceProvider->id)
            ->get();
    }
}
