<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubClassificationInterface;
use App\Models\News;
use App\Models\SubClassification;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SubClassificationRepository extends BaseRepository implements SubClassificationInterface
{
    public function __construct(SubClassification $subClassification)
    {
        $this->model = $subClassification;
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
            ->with('classification')
            ->where('classification_id', $request->classification_id)
            ->when($request->name,function($query) use ($request){
                $query->where('name','LIKE','%'.$request->name.'%');
            })
            ->orderBy('code')
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
            ->where('classification_id', $request->classification_id)
            ->orderBy('code')
            ->get();
    }
}
