<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\QualificationTrainingInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\QualificationTrainingRequest;
use App\Http\Resources\QualificationTrainingResource;
use App\Models\QualificationTraining;
use App\Traits\PaginationTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QualificationTrainingController extends Controller
{
    use PaginationTrait;
    private QualificationTrainingInterface $qualificationTraining;

    public function __construct(QualificationTrainingInterface $qualificationTraining)
    {
        $this->qualificationTraining = $qualificationTraining;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $qualificationTrainings = $this->qualificationTraining->customPaginate($request, 10);
        if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($qualificationTrainings->currentPage(), $qualificationTrainings->lastPage());
        $data['data'] = QualificationTrainingResource::collection($qualificationTrainings);
        return ResponseHelper::success($data);
        } else {
            return view('pages.qualification-training', ['qualificationTrainings' => $qualificationTrainings]);
        }
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
    public function store(QualificationTrainingRequest $request)
    {
        $this->qualificationTraining->store($request->validated());
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
    public function update(QualificationTrainingRequest $request, QualificationTraining $qualificationTraining)
    {
        $this->qualificationTraining->update($qualificationTraining->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualificationTraining $qualificationTraining, Request $request)
    {
        $this->qualificationTraining->delete($qualificationTraining->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * jsonQualificationTraining
     *
     * @return JsonResponse
     */
    public function jsonQualificationTraining(): JsonResponse
    {
        return ResponseHelper::success(QualificationTrainingResource::collection($this->qualificationTraining->get()));
    }
}
