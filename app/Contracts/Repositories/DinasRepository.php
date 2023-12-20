<?php

namespace App\Contracts\Repositories;

use App\Models\Dinas;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\DinasInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class DinasRepository extends BaseRepository implements DinasInterface
{
    public function __construct(Dinas $dinas)
    {
        $this->model = $dinas;
    }

    /**
     * countAccidentByDinas
     *
     * @param  mixed $request
     * @return mixed
     */
    public function countAccidentByDinas(Request $request): mixed
    {
        return $this->model->query()
            ->with('projects', function ($query) use ($request) {
                $query->with(['accidents' => function ($subquery) use ($request) {
                    $subquery->when($request->year, function ($subsubquery) use ($request) {
                        $subsubquery->whereYear('time', $request->year);
                    });
                }]);
            })
            ->get();
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
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('user', 'name', 'LIKE', '%' . $request->name . '%');
            })
            ->withCount('projects')
            ->with('user', 'projects')
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
     * customPaginate
     *
     * @param  mixed $request
     * @param  mixed $pagination
     * @return LengthAwarePaginator
     */
    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->where('name_opd', 'LIKE', '%' . $request->name . '%');
            })
            ->fastPaginate($pagination);
    }
}
