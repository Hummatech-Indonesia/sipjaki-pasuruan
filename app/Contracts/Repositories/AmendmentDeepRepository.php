<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AmendmentDeepInterface;
use App\Models\AmendmentDeed;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AmendmentDeepRepository extends BaseRepository implements AmendmentDeepInterface
{
    public function __construct(AmendmentDeed $amendmentDeed)
    {
        $this->model = $amendmentDeed;
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
            ->updateOrCreate(['service_provider_id' => $data['service_provider_id']], $data);
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
            ->fastPaginate($pagination);
    }
}
