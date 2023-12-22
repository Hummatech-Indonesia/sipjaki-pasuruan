<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Http\Requests\ConsultantProjectRequest;
use App\Http\Requests\ConsultantProjectUpdateRequest;
use App\Models\Project;
use App\Services\ConsultantProjectService;

class ConsultantProjectController extends Controller
{
    private ConsultantProjectInterface $consultantProject;
    private ConsultantProjectService $service;
    private ProjectInterface $project;
    public function __construct(ConsultantProjectInterface $consultantProjectInterface, ConsultantProjectService $consultantProjectService, ProjectInterface $project)
    {
        $this->project = $project;
        $this->consultantProject = $consultantProjectInterface;
        $this->service = $consultantProjectService;
    }
    /**
     * Display a listing of the resource.
     * @param  mixed $project
     * @return void
     */
    public function index(Project $project)
    {
        $consultantProjects = $this->consultantProject->show($project->id);
        return view('', ['consultantProjects' => $consultantProjects]);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $project
     * @return void
     */
    public function store(ConsultantProjectRequest $request, Project $project)
    {
        $this->consultantProject->store($this->service->store($request, $project));
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update(ConsultantProjectUpdateRequest $request, Project $project)
    {
        $this->consultantProject->update($project->consultantProject->id, $request->validated());
        $this->project->update($project->id, $request->validated());
        return redirect()->back()->with('success', trans('alert.update_success'));
    }
}
