<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubClassificationInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\SubClassificationRequest;
use App\Http\Resources\SubClassificationResource;
use App\Models\SubClassification;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class SubClassificationController extends Controller
{

    use PaginationTrait;

    private SubClassificationInterface $subClassification;

    public function __construct(SubClassificationInterface $subClassification)
    {
        $this->subClassification = $subClassification;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subClassifications = $this->subClassification->customPaginate($request, 10);
        $data['paginate'] = $this->customPaginate($subClassifications->currentPage(), $subClassifications->lastPage());
        $data['data'] = SubClassificationResource::collection($subClassifications);
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
    public function store(SubClassificationRequest $request)
    {
        $this->subClassification->store($request->validated());
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
    public function update(SubClassificationRequest $request, SubClassification $subClassification)
    {
        $this->subClassification->update($subClassification->id, $request->validated());
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubClassification $subClassification)
    {
        $this->subClassification->delete($subClassification->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
