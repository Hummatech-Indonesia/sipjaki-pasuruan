<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassificationInterface;
use App\Http\Requests\ClassificationRequest;
use App\Models\Classification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    private ClassificationInterface $classification;
    public function __construct(ClassificationInterface $classification)
    {
        $this->classification = $classification;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $data = $this->classification->search($request);
        return view('classification.index', ['data' => $data]);
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
    public function store(ClassificationRequest $request)
    {
        $this->classification->store($request->validated());
        return redirect()->back();
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
     * @param  mixed $request
     * @param  mixed $classification
     * @return void
     */
    public function update(ClassificationRequest $request, Classification $classification)
    {
        $this->classification->update($classification->id, $request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param  mixed $classification
     * @return void
     */
    public function destroy(Classification $classification)
    {
        $this->classification->delete($classification->id);
        return redirect()->back();
    }
}
