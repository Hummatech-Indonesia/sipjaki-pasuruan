<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Enums\TypeOfBusinessEntityEnum;

class ServiceProviderRepository extends BaseRepository implements ServiceProviderInterface
{

    public function __construct(ServiceProvider $serviceProvider)
    {
        $this->model = $serviceProvider;
    }

    /**
     * get
     *
     * @return mixed
     */
    public function get() : mixed
    {
        return $this->model->query()
            ->with('user', 'association')
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
            ->with('user', 'association')
            ->when($request->service_provider, function ($query) use ($request) {
                $query->whereRelation('user', 'name', 'LIKE', '%'. $request->service_provider .'%');
            })
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
            ->with('fiscalYear')
            ->when($request->name,function($query) use ($request){
                $query->where('name','LIKE','%'.$request->name.'%');
            })
            ->fastPaginate($pagination);
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
     * getConsultant
     *
     * @return mixed
     */
    public function getConsultant(): mixed
    {
        return $this->model->query()
            ->where('type_of_business_entity',TypeOfBusinessEntityEnum::CONSULTANT->value)
            ->get();
    }
    
    /**
     * getExecutor
     *
     * @return mixed
     */
    public function getExecutor(): mixed
    {
        return $this->model->query()
            ->where('type_of_business_entity',TypeOfBusinessEntityEnum::EXECUTOR->value)
            ->get();
    }
}
