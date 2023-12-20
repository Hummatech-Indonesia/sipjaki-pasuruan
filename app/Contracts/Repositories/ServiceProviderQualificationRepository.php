<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ServiceProviderQualificationInterface;
use App\Enums\ServiceProviderQualificationEnum;
use App\Models\ServiceProviderQualification;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ServiceProviderQualificationRepository extends BaseRepository implements ServiceProviderQualificationInterface
{
    public function __construct(ServiceProviderQualification $serviceProviderQualification)
    {
        $this->model = $serviceProviderQualification;
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

    /**
     * delete
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete(mixed $id): mixed
    {
        return $this->show($id)
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
        return $this->show($id)
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
            ->findOrFail($id);
    }

    /**
     * getActive
     *
     * @return mixed
     */
    public function getActive(): mixed
    {
        return $this->model->query()
            ->where('status', ServiceProviderQualificationEnum::ACTIVE->value)
            ->get();
    }

    /**
     * getPending
     *
     * @return mixed
     */
    public function getPending(): mixed
    {
        return $this->model->query()
            ->where('status', ServiceProviderQualificationEnum::PENDING->value)
            ->get();
    }

    /**
     * getReject
     *
     * @return mixed
     */
    public function getReject(): mixed
    {
        return $this->model->query()
            ->where('service_provider_id', auth()->user()->serviceProvider->id)
            ->where('status', ServiceProviderQualificationEnum::REJECT->value)
            ->get();
    }
}
