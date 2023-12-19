<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\FoundingDeepInterface;
use App\Models\FoundingDeed;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FoundingDeepRepository extends BaseRepository implements FoundingDeepInterface
{
    public function __construct(FoundingDeed $foundingDeed)
    {
        $this->model = $foundingDeed;
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
