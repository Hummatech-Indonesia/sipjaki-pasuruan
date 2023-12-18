<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassificationTrainingInterface;
use App\Http\Requests\ClassificationTrainingRequest;
use App\Models\ClassificationTraining;
use Illuminate\Http\Request;

class ClassificationTrainingController extends Controller
{
    private ClassificationTrainingInterface $classificationTraining;
    public function __construct(ClassificationTrainingInterface $classificationTrainingInterface)
    {
        $this->classificationTraining = $classificationTrainingInterface;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $classificationTrainings = $this->classificationTraining->get();
        return view('pages.classification.training', ['classificationTrainings' => $classificationTrainings ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ClassificationTrainingRequest $request)
    {
        $this->classificationTraining->store($request->validated());
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * show
     *
     * @param  mixed $classification_training
     * @return void
     */
    public function show(ClassificationTraining $classification_training)
    {
        return view('pages.classification.sub-training', ['classificationTraining' => $classification_training]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $classification_training
     * @return void
     */
    public function update(ClassificationTrainingRequest $request, ClassificationTraining $classification_training)
    {
        $this->classificationTraining->update($classification_training->id, $request->validated());
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * destroy
     *
     * @param  mixed $classification_training
     * @return void
     */
    public function destroy(ClassificationTraining $classification_training)
    {
        $this->classificationTraining->delete($classification_training->id);
        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
