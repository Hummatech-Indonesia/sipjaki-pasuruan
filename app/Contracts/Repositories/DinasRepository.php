<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\DinasInterface;
use App\Models\Dinas;
use Illuminate\Http\Request;

class DinasRepository extends BaseRepository implements DinasInterface
{
    public function __construct(Dinas $dinas)
    {
        $this->model = $dinas;
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
            ->when($request->name,function($query) use ($request){
                $query->where('name','LIKE','%'.$request->name.'%');
            })
            ->withCount('projects')
            ->with('user')
            ->get();
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
}
