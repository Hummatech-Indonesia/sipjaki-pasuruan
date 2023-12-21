<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubClassificationTrainingInterface;
use App\Models\SubClassificationTraining;

class SubClassificationTrainingRepository extends BaseRepository implements SubClassificationTrainingInterface
{
    public function __construct(SubClassificationTraining $subClassificationTraining)
    {
        $this->model = $subClassificationTraining;
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
            ->where('classification_training_id',  $id)
            ->orderByDesc('created_at')
            ->get();
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
}
