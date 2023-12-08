<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TrainingMethodInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\TrainingMethodRequest;
use App\Http\Resources\TrainingMethodResource;
use App\Models\TrainingMethod;
use App\Traits\PaginationTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
        $traingMethods = $this->traingMethod->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($traingMethods->currentPage(), $traingMethods->lastPage());
            $data['data'] = TrainingMethodResource::collection($traingMethods);
            return ResponseHelper::success($data);
        } else {
            return view('methods.index' , compact('traingMethods'));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingMethodRequest $request)
    {
        $this->traingMethod->store($request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
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
    public function update(TrainingMethodRequest $request, TrainingMethod $training_method)
    {
        $this->traingMethod->update($training_method->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingMethod $training_method, Request $request)
    {
        $this->traingMethod->delete($training_method->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * listTrainingMethod
     *
     * @return JsonResponse
     */
    public function listTrainingMethod(): JsonResponse
    {
        return ResponseHelper::success(TrainingMethodResource::collection($this->traingMethod->get()));
    }
}
