<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;
use App\Models\ExecutorProject;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Enums\TypeOfBusinessEntityEnum;

class ExecutorProjectRepository extends BaseRepository implements ExecutorProjectInterface
{
    public function __construct(ExecutorProject $executorProject)
    {
        $this->model = $executorProject;
    }

     /**
     * get
     *
     * @return mixed
     */
    public function get() : mixed
    {
        return $this->model->query()
            ->when(auth()->user()->dinas, function ($query) {
                $query->whereRelation('consultantProject','dinas_id', auth()->user()->dinas->id);
            })
            ->latest()
            ->get();
    }

    /**
     * get
     *
     * @return mixed
     */
    public function show(mixed $id): mixed
    {
        return $this->model->query()
            ->findOrFail($id);
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
     * customPaginate
     *
     * @param  mixed $request
     * @param  mixed $pagination
     * @return LengthAwarePaginator
     */
    public function customPaginate(Request $request, int $pagination = 10): LengthAwarePaginator
    {
        return $this->model->query()
            ->when(auth()->user()?->dinas, function ($query) {
                $query->whereRelation('consultantProject','dinas_id', auth()->user()->dinas->id);
            })
            ->when(auth()->user()?->serviceProvider,function($query){
                $query->when(auth()->user()->serviceProvider->type_of_business_entity == TypeOfBusinessEntityEnum::CONSULTANT->value,function($q){
                    $q->whereRelation('consultantProject','service_provider_id',auth()->user()->serviceProvider->id);
                });
                $query->when(auth()->user()->serviceProvider->type_of_business_entity == TypeOfBusinessEntityEnum::EXECUTOR->value,function($q){
                    $q->where('service_provider_id',auth()->user()->serviceProvider->id);
                });
            })
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->year, function ($query) use ($request) {
                $query->where('fiscal_year_id', $request->year);
            })
            ->when($request->dinas, function ($query) use ($request) {
                $query->whereRelation('consultantProject','dinas_id', $request->dinas);
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->fastPaginate($pagination);
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
            ->with('accidents','consultantProject')
            ->when(auth()->user()->dinas, function ($query) {
                $query->whereRelation('consultantProject','dinas_id', auth()->user()->dinas->id);
            })
            ->when(auth()->user()->serviceProvider,function($query){
                $query->when(auth()->user()->serviceProvider->type_of_business_entity == TypeOfBusinessEntityEnum::CONSULTANT->value,function($q){
                    $q->whereRelation('consultantProject','service_provider_id',auth()->user()->serviceProvider->id);
                });
                $query->when(auth()->user()->serviceProvider->type_of_business_entity == TypeOfBusinessEntityEnum::EXECUTOR->value,function($q){
                    $q->where('service_provider_id',auth()->user()->serviceProvider->id);
                });
            })
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })
            ->when($request->year, function ($query) use ($request) {
                $query->where('fiscal_year_id', $request->year);
            })
            ->when($request->dinas, function ($query) use ($request) {
                $query->whereRelation('consultantProject','dinas_id', $request->dinas);
            })
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
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
            ->when(auth()->user()->dinas,function($query){
                $query->whereRelation('consultantProject','dinas_id',auth()->user()->dinas->id);
            })
            ->when(auth()->user()->serviceProvider,function($query){
                $query->when(auth()->user()->serviceProvider->type_of_business_entity == TypeOfBusinessEntityEnum::CONSULTANT->value,function($q){
                    $q->whereRelation('consultantProject','service_provider_id',auth()->user()->serviceProvider->id);
                });
                $query->when(auth()->user()->serviceProvider->type_of_business_entity == TypeOfBusinessEntityEnum::EXECUTOR->value,function($q){
                    $q->where('service_provider_id',auth()->user()->serviceProvider->id);
                });
            })
            ->when(isset($data['status']),function($query) use ($data){
                $query->where('status',$data['status']);
            })
            ->count();
    }
}
