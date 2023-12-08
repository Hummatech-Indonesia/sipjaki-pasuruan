<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\DinasInterface;
use App\Models\Dinas;

class DinasRepository extends BaseRepository implements DinasInterface
{
    public function __construct(Dinas $dinas)
    {
        $this->model = $dinas;
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
