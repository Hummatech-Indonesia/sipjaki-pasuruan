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
            ->updateOrCreate(['project_id' => $data['project_id'], $data]);
    }
}
