<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Models\ConsultantProject;

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
            ->updateOrCreate(['project_id' => $data['project_id'], $data]);
    }
}
