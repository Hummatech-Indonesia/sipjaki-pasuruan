<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubQualificationTrainingInterface;
use App\Http\Requests\SubQualificationTrainingRequest;
use App\Models\QualificationTraining;
use App\Models\SubQualificationTraining;

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
        $data = $this->subQualificationTraining->show($qualification_training->id);
        return view('');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubQualificationTraining $sub_qualification_training)
    {
        $this->subQualificationTraining->delete($sub_qualification_training->id);
    }
}
