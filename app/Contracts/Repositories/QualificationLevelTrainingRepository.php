<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\QualificationLevelTrainingInterface;
use App\Models\QualificationLevelTraining;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class QualificationLevelTrainingRepository extends BaseRepository implements QualificationLevelTrainingInterface
{
    public function __construct(QualificationLevelTraining $qualificationLevelTraining)
    {
        $this->model = $qualificationLevelTraining;
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
     * show
     *
     * @param  mixed $id
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->where('qualification_training_id', $id)
            ->get();
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
        ->where('qualification_training_id', $request->qualification_training_id)
        ->when($request->name,function($query) use ($request){
            $query->where('name','LIKE','%'.$request->name.'%');
        });
    }
}
