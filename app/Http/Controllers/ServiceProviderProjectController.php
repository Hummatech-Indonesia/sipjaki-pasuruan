<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\ServiceProviderProjectInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ServiceProviderProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\ServiceProviderProject;
use App\Services\ServiceProviderProjectService;
use App\Traits\PaginationTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceProviderProjectController extends Controller
{
    use PaginationTrait;
    private ProjectInterface $project;
    private ServiceProviderProjectService $service;
    private ServiceProviderProjectInterface $serviceProviderProject;
    public function __construct(ServiceProviderProjectInterface $serviceProviderProject, ProjectInterface $project, ServiceProviderProjectService $service)
    {
        $this->service = $service;
        $this->serviceProviderProject = $serviceProviderProject;
        $this->project = $project;
    }

    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $serviceProviderProjects = $this->project->serviceProviderProject($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($serviceProviderProjects->currentPage(), $serviceProviderProjects->lastPage());
            $data['data'] = ProjectResource::collection($serviceProviderProjects);
            return ResponseHelper::success($data);
        } else {
            return view('', ['serviceProviderProjects' => $serviceProviderProjects]);
        }
    }

    /**
     * store
     *
     * @return JsonResponse
     */
    public function store(ServiceProviderProjectRequest $request, Project $project)
    {
        $request->merge(['project_id' => $project->id]);
        $serviceProviderProjects = $this->serviceProviderProject->search($request);
        $service = $this->service->store($request, $serviceProviderProjects, $project);
        if ($service == true) {
            $this->serviceProviderProject->store($service);
            // if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
            // } else {
            //     return redirect()->back()->with('success', trans('alert.add_success'));
            // }
        } else {
            $progres = 0;
            foreach ($serviceProviderProjects as $serviceProviderProject) {
                $progres += $serviceProviderProject->progres;
            }
            // if ($request->is('api/*')) {
            return ResponseHelper::error(null, "Project yang anda kerjakan saat ini sudah mencapai " . $progres . "% jadi anda hanya bisa menambahkan progress maksimal " . 100 - $progres . "%");
            // } else {
            // return redirect()->back()->withErrors("Project yang anda kerjakan saat ini sudah mencapai " . $progres . "% jadi anda hanya bisa menambahkan progress maksimal " . 100 - $progres . "%");
            // }
        }
    }

    /**
     * show
     *
     * @param  mixed $service_provider_project
     * @return void
     */
    public function show(ServiceProviderProject $service_provider_project) {
        $projectYear = $service_provider_project->project->year;
        $projectName = $service_provider_project->project->name;
        return view('', ['service_provider_project' => $service_provider_project]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $serviceProviderProject
     * @return void
     */
    public function update(ServiceProviderProjectRequest $request, ServiceProviderProject $service_provider_project)
    {
        $request->merge(['project_id' => $service_provider_project->project_id]);
        $serviceProviderProjects = $this->serviceProviderProject->search($request);
        $service = $this->service->update($request, $service_provider_project, $serviceProviderProjects);
        if ($service == true) {
            $this->serviceProviderProject->update($service_provider_project->id, $service);
        } else {
            $progres = 0;
            foreach ($serviceProviderProjects as $serviceProviderProject) {
                $progres += $serviceProviderProject->progres;
            }
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, "Project yang anda kerjakan saat ini sudah mencapai " . $progres - $service_provider_project->progres . "% jadi anda hanya bisa mengubah nilai progress maksimal " . 100 - ($progres - $service_provider_project->progres) . "%");
            } else {
                return redirect()->back()->withErrors("Project yang anda kerjakan saat ini sudah mencapai " . $progres - $service_provider_project->progres . "% jadi anda hanya bisa mengubah nilai progress maksimal " . 100 - ($progres - $service_provider_project->progres) . "%");
            }
        }
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * destroy
     *
     * @param  mixed $service_provider_project
     * @return void
     */
    public function destroy(ServiceProviderProject $service_provider_project)
    {
        $this->service->remove($service_provider_project->file);
        $this->serviceProviderProject->delete($service_provider_project->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }

    /**
     * downloadServiceProviderProject
     *
     * @param  mixed $project
     * @return void
     */
    public function downloadServiceProviderProject(Project $project)
    {
        $data = $this->serviceProviderProject->getByProject($project->id);
        return $this->service->downloadFiles($data);
    }

    /**
     * downloadFile
     *
     * @param  mixed $service_provider_project
     * @return void
     */
    public function downloadFile(ServiceProviderProject $service_provider_project)
    {
        return $this->service->download($service_provider_project->file);
    }
}
