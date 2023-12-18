<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\OfficerInterface;
use App\Http\Requests\OfficerRequest;
use App\Models\Officer;

class OfficerController extends Controller
{
    private OfficerInterface $officer;
    public function __construct(OfficerInterface $officerInterface) {
        $this->officer = $officerInterface;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $officers = $this->officer->get();
        return view('pages.service-provider.officer', ['officers' => $officers]);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {

    }


    public function store(OfficerRequest $request)
    {
        $this->officer->store($request->validated());
        
        return redirect()->back()->with('success', trans('alert.add_success'));
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

    public function update(OfficerRequest $request, Officer $officer)
    {
        $this->officer->update($officer->id, $request->validated());
    }

    /**
     * destroy
     *
     * @param  mixed $officer
     * @return void
     */
    public function destroy(Officer $officer)
    {
        $this->officer->delete($officer->id);
    }
}
