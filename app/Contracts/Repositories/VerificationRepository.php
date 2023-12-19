<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\VerificationInterface;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class VerificationRepository extends BaseRepository implements VerificationInterface
{
    public function __construct(Verification $verification)
    {
        $this->model = $verification;
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
