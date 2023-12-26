<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Http\Requests\ExecutorProjectRequest;
use App\Models\Project;
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
     * index
     *
     * @return void
     */
    public function index(Project $project)
    {
        $executorProjects = $this->executorProject->show($project->id);
        return view('', ['executorProjects' => $executorProjects]);
    }


    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $project
     * @return void
     */
    public function store(ExecutorProjectRequest $request, Project $project)
    {
        $data = $this->service->store($request, $project);
        $this->executorProject->store($data);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }
}
