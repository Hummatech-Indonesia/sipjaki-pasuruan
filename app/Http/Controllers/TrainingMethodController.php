<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TrainingMethodInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\TrainingMethodRequest;
use App\Http\Resources\TrainingMethodResource;
use App\Models\TrainingMethod;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class TrainingMethodController extends Controller
{
    use PaginationTrait;

    private TrainingMethodInterface $traingMethod;
    public function __construct(TrainingMethodInterface $traingMethod)
    {
        $this->traingMethod = $traingMethod;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $traingMethods = $this->traingMethod->customPaginate($request, $request->pagination);
        $data['paginate'] = $this->customPaginate($traingMethods->currentPage(), $traingMethods->lastPage());
        $data['data'] = TrainingMethodResource::collection($traingMethods);
        return ResponseHelper::success($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingMethodRequest $request)
    {
        $this->traingMethod->store($request->validated());
        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingMethodRequest $request, TrainingMethod $traingMethod)
    {
        $this->traingMethod->update($traingMethod->id, $request->validated());
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingMethod $traingMethod)
    {
        $this->traingMethod->delete($traingMethod->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
