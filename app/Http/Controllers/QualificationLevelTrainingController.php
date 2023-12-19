<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\QualificationLevelTrainingInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\QualificationLevelTrainingRequest;
use App\Http\Resources\QualificationLevelTrainingResource;
use App\Models\QualificationLevel;
use App\Models\QualificationLevelTraining;
use App\Traits\PaginationTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QualificationLevelTrainingController extends Controller
{
    use PaginationTrait;
    private QualificationLevelTrainingInterface $qualificationLevelTraining;

    public function __construct(QualificationLevelTrainingInterface $qualificationLevelTraining)
    {
        $this->qualificationLevelTraining = $qualificationLevelTraining;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $qualificationLevelTrainings = $this->qualificationLevelTraining->customPaginate($request, 10);
        // if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($qualificationLevelTrainings->currentPage(), $qualificationLevelTrainings->lastPage());
        $data['data'] = QualificationLevelTrainingResource::collection($qualificationLevelTrainings);
        return ResponseHelper::success($data);
        // } else {
        //     return view();
        // }
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
    public function store(QualificationLevelTrainingRequest $request)
    {
        $this->qualificationLevelTraining->store($request->validated());
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
    public function update(QualificationLevelTrainingRequest $request, QualificationLevelTraining $qualificationLevelTraining)
    {
        $this->qualificationLevelTraining->update($qualificationLevelTraining->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualificationLevelTraining $qualificationLevelTraining, Request $request)
    {
        $this->qualificationLevelTraining->delete($qualificationLevelTraining->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * jsonQualificationLevelTraining
     *
     * @return JsonResponse
     */
    public function jsonQualificationLevelTraining(): JsonResponse
    {
        return ResponseHelper::success(QualificationLevelTrainingResource::collection($this->qualificationLevelTraining->get()));
    }
}
