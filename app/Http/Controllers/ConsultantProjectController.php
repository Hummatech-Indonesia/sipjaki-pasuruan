<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\ConsultantProjectService;
use App\Contracts\Interfaces\ProjectInterface;
use App\Http\Requests\ConsultantProjectRequest;
use App\Http\Requests\ConsultantProjectUpdateRequest;
use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\ProjectResource;
use App\Models\ConsultantProject;
use Illuminate\Http\JsonResponse;

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
        return view('pages.service-provider.detail-consultant', ['consultantProject' => $consultantProjects, 'project' => $project]);
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
        $data = $this->service->store($request, $project);
        $this->consultantProject->store($data);
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

    /**
     * downloadContract
     *
     * @param  mixed $consultantProject
     * @return void
     */
    public function downloadContract(ConsultantProject $consultantProject)
    {
        $filePath = pathinfo(basename($consultantProject->contract, PATHINFO_EXTENSION));
        return response()->download(storage_path('app/public/' . $consultantProject->contract), $consultantProject->project->name . '.' . $filePath['extension']);
    }

    /**
     * downloadAdministrativeMinutes
     *
     * @param  mixed $downloadAdministrativeMinutes
     * @return void
     */
    public function downloadAdministrativeMinutes(ConsultantProject $consultantProject)
    {
        $filePath = pathinfo(basename($consultantProject->administrative_minutes, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/public/' . $consultantProject->administrative_minutes), $consultantProject->project->name . '.' . $filePath['extension']);
    }

    /**
     * downloadReport
     *
     * @param  mixed $downloadReport
     * @return void
     */
    public function downloadReport(ConsultantProject $consultantProject)
    {
        $filePath = pathinfo(basename($consultantProject->report, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/public/' . $consultantProject->report), $consultantProject->project->name . '.' . $filePath['extension']);
    }


    /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $consultantProject
     * @return void
     */
    public function downloadMinutesOfDisbursement(ConsultantProject $consultantProject)
    {
        $filePath = pathinfo(basename($consultantProject->minutes_of_disbursement, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/public/' . $consultantProject->minutes_of_disbursement), $consultantProject->project->name . '.' . $filePath['extension']);
    }
}
