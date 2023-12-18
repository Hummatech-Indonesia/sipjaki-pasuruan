<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubQualificationInterface;
use App\Http\Requests\SubQualificationRequest;
use App\Models\Classification;
use App\Models\Qualification;
use App\Models\SubQualification;
use Illuminate\Http\Request;

class SubQualificationController extends Controller
{
    private SubQualificationInterface $subQualification;
    public function __construct(SubQualificationInterface $subQualificationInterface)
    {
        $this->subQualification = $subQualificationInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Qualification $qualification)
    {
        $data = $this->subQualification->show($qualification->id);
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
    public function store(SubQualificationRequest $request, Qualification $qualification)
    {
        $data = $request->validated();
        $data['qualification_id'] = $qualification->id;
        $this->subQualification->store($data);
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
    public function update(SubQualificationRequest $request, SubQualification $sub_qualification)
    {
        $this->subQualification->update($sub_qualification->id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubQualification $sub_qualification)
    {
        $this->subQualification->delete($sub_qualification->id);
    }
}
