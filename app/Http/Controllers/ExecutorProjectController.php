<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Http\Requests\ExecutorProjectRequest;
use App\Models\ExecutorProject;
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

        /**
     * downloadContract
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadContract(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->contract, PATHINFO_EXTENSION));
        return response()->download(storage_path('app/' . $executorProject->contract), $executorProject->project->name . '.' . $filePath['extension']);
    }

    /**
     * downloadAdministrativeMinutes
     *
     * @param  mixed $downloadAdministrativeMinutes
     * @return void
     */
    public function downloadAdministrativeMinutes(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->administrative_minutes, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->administrative_minutes), $executorProject->project->name . '.' . $filePath['extension']);
    }

    /**
     * downloadReport
     *
     * @param  mixed $downloadReport
     * @return void
     */
    public function downloadReport(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->report, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->report), $executorProject->project->name . '.' . $filePath['extension']);
    }


    /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadMinutesOfDisbursement(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->minutes_of_disbursement, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->minutes_of_disbursement), $executorProject->project->name . '.' . $filePath['extension']);
    }

    /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadUitzetMinutes(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->uitzet_minutes, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->uitzet_minutes), $executorProject->project->name . '.' . $filePath['extension']);
    }

    
    /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadMutualCheck0(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->mutual_check_0, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->mutual_check_0), $executorProject->project->name . '.' . $filePath['extension']);
    }

    
    /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadMutualCheck100(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->mutual_check_100, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->mutual_check_100), $executorProject->project->name . '.' . $filePath['extension']);
    }

    
    /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadP1MeetingMinutes(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->p1_meeting_minutes, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->p1_meeting_minutes), $executorProject->project->name . '.' . $filePath['extension']);
    }

        /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadP2MeetingMinutes(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->p2_meeting_minutes, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $executorProject->p2_meeting_minutes), $executorProject->project->name . '.' . $filePath['extension']);
    }
}
