<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Enums\UploadDiskEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ConsultantProjectRequest;
use App\Models\Project;
use App\Services\ConsultantProjectService;
use Illuminate\Http\Request;

class ConsultantProjectController extends Controller
{
    private ConsultantProjectInterface $consultantProject;
    private ConsultantProjectService $service;
    public function __construct(ConsultantProjectInterface $consultantProjectInterface, ConsultantProjectService $consultantProjectService)
    {
        $this->consultantProject = $consultantProjectInterface;
        $this->service = $consultantProjectService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultantProjects = $this->consultantProject->get();
        return view('', ['consultantProjects' => $consultantProjects]);
    }

    public function store(ConsultantProjectRequest $request, Project $project)
    {
        $this->consultantProject->store($this->service->store($request, $project));
        return redirect()->back()->with('success', trans('alert.update_success'));
    }
}
