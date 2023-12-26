<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Models\ExecutorProject;

class ExecutorProjectRepository extends BaseRepository implements ExecutorProjectInterface
{
    public function __construct(ExecutorProject $executorProject)
    {
        $this->model = $executorProject;
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
            ->updateOrCreate(['project_id' => $data['project_id']], $data);
    }
}
