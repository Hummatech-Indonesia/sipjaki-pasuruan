<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\DinasFieldInterface;
use App\Models\DinasField;

class DinasFieldRepository extends BaseRepository implements DinasFieldInterface
{
    public function __construct(DinasField $dinasField)
    {
        $this->model = $dinasField;
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
            ->updateOrCreate(['dinas_id' => $data['dinas_id'], 'field_id' => $data['field_id']], $data);
    }
}
