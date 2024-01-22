<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AccidentInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\Accident;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AccidentRepository extends BaseRepository implements AccidentInterface
{
    public function __construct(Accident $accident)
    {
        $this->model = $accident;
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->query()
            ->whereRelation('project', 'dinas_id', auth()->user()->dinas->id)
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
        return $this->show($id)->delete();
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
     * search
     *
     * @param  mixed $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when(auth()->user()->dinas,function($query){
                $query->where('dinas_id',auth()->user()->dinas->id);
            })
            ->when($request->name,function($query) use ($request){
                $query->where('name','LIKE','%'.$request->name.'%');
            })
            ->latest()
            ->get();
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
            ->when(auth()->user()->dinas,function($query){
                $query->whereRelation('executorProject.consultantProject','dinas_id',auth()->user()->dinas->id);
            })
            ->latest()
            ->fastPaginate($pagination);
    }
}
