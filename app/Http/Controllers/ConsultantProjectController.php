<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\ConsultantProjectService;
use App\Contracts\Interfaces\ProjectInterface;
use App\Http\Requests\ConsultantProjectRequest;
use App\Http\Requests\ConsultantProjectUpdateRequest;
use App\Contracts\Interfaces\ConsultantProjectInterface;

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

    /**
     * index
     *
     * @return void
     */
    public function consultantProject(Request $request)
    {
        $serviceProviderProjects = $this->project->serviceProviderProject($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($serviceProviderProjects->currentPage(), $serviceProviderProjects->lastPage());
            $data['data'] = ProjectResource::collection($serviceProviderProjects);
            return ResponseHelper::success($data);
        } else {
            $year = $request->year;
            return view('pages.service-provider.consultant-package', ['serviceProviderProjects' => $serviceProviderProjects, 'year' => $year]);
        }
    }
}
