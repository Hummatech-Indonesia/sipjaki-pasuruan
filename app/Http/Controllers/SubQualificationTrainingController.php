<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubQualificationTrainingInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\SubQualificationTrainingRequest;
use App\Http\Resources\SubQualificationTrainingResource;
use App\Models\QualificationTraining;
use App\Models\SubQualificationTraining;
use Illuminate\Http\JsonResponse;

class SubQualificationTrainingController extends Controller
{
    private SubQualificationTrainingInterface $subQualificationTraining;
    public function __construct(SubQualificationTrainingInterface $subQualificationTrainingInterface)
    {
        $this->subQualificationTraining = $subQualificationTrainingInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(QualificationTraining $qualification_training)
    {
        $id = $qualification_training->id;
        $subQualificationTrainings = $this->subQualificationTraining->show($qualification_training->id);
        return view('pages.sub-qualification-training', compact('subQualificationTrainings','id'));
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
    public function store(SubQualificationTrainingRequest $request, QualificationTraining $qualification_training)
    {
        $data = $request->validated();
        $data['qualification_training_id'] = $qualification_training->id;
        $this->subQualificationTraining->store($data);

        return redirect()->back()->with('success',trans('alert.add_success'));
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
    public function update(SubQualificationTrainingRequest $request, SubQualificationTraining $sub_qualification_training)
    {
        $this->subQualificationTraining->update($sub_qualification_training->id, $request->validated());

        return redirect()->back()->with('success',trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubQualificationTraining $sub_qualification_training)
    {
        $this->subQualificationTraining->delete($sub_qualification_training->id);
        return redirect()->back()->with('success',trans('alert.delete_success'));
    }

    /**
     * jsonSubQualificationTraining
     *
     * @param  mixed $qualification_training
     * @return JsonResponse
     */
    public function jsonSubQualificationTraining(QualificationTraining $qualification_training): JsonResponse
    {
        return ResponseHelper::success(SubQualificationTrainingResource::collection($this->subQualificationTraining->show($qualification_training->id)));
    }
}
