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
