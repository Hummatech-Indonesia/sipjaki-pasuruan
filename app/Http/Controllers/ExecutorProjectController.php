<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Services\ExecutorProjectService;
use Illuminate\Http\Request;

class ExecutorProjectController extends Controller
{
    private ExecutorProjectInterface $executorProject;
    private ExecutorProjectService $service;
    public function __construct(ExecutorProjectInterface $executorProjectInterface, ExecutorProjectService $executorProjectService) {
        $this->executorProject = $executorProjectInterface;
        $this->service = $executorProjectService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
