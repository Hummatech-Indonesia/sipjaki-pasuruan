<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubClassificationTrainingInterface;
use App\Http\Requests\SubClassificationRequest;
use App\Http\Requests\SubClassificationTrainingRequest;
use App\Models\ClassificationTraining;
use App\Models\SubClassificationTraining;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubClassificationTrainingController extends Controller
{
    private SubClassificationTrainingInterface $subClassificationTraining;
    public function __construct(SubClassificationTrainingInterface $subClassificationTrainingInterface)
    {
        $this->subClassificationTraining = $subClassificationTrainingInterface;
    }

    /**
     * index
     *
     * @param  mixed $classification_training
     * @return View
     */
    public function index(ClassificationTraining $classification_training): View
    {
        $subClassificationTrainings = $this->subClassificationTraining->show($classification_training->id);
        return view('pages.classification.sub-training', ['subClassificationTrainings' => $subClassificationTrainings,'classification_training' => $classification_training]);
    }

    public function create()
    {
        //
    }

    public function store(ClassificationTraining $classification_training, SubClassificationTrainingRequest $request)
    {
        $data = $request->validated();
        $data['classification_training_id'] = $classification_training->id;
        $this->subClassificationTraining->store($data);
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $sub_classification_training
     * @return void
     */
    public function update(SubClassificationRequest $request, SubClassificationTraining $sub_classification_training)
    {
        $this->subClassificationTraining->update($sub_classification_training->id, $request->validated());
        return redirect()->back()->with('success', trans('alert.update_success'));
    }


    /**
     * destroy
     *
     * @param  mixed $sub_classification_training
     * @return void
     */
    public function destroy(SubClassificationTraining $sub_classification_training)
    {
        $this->subClassificationTraining->delete($sub_classification_training->id);
        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
