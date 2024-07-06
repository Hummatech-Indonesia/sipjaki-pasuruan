<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\OfficerInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\ServiceProviderProjectInterface;
use App\Contracts\Interfaces\ServiceProviderQualificationInterface;
use App\Contracts\Interfaces\WorkerInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ServiceProviderProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ServiceProviderProjectResource;
use App\Models\ExecutorProject;
use App\Models\Project;
use App\Models\ServiceProvider;
use App\Models\ServiceProviderProject;
use App\Services\ServiceProviderProjectService;
use App\Traits\PaginationTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceProviderProjectController extends Controller
{
    use PaginationTrait;
    private ExecutorProjectInterface $executorProject;
    private ServiceProviderProjectService $service;
    private ServiceProviderInterface $serviceProvider;
    private ServiceProviderProjectInterface $serviceProviderProject;
    private OfficerInterface $officer;
    private WorkerInterface $worker;
    private ServiceProviderQualificationInterface $serviceProviderQualification;
    private FiscalYearInterface $fiscalYear;

    public function __construct(
        ServiceProviderInterface $serviceProviderInterface,
        ServiceProviderProjectInterface $serviceProviderProject,
        ExecutorProjectInterface $executorProject,
        ServiceProviderProjectService $service,
        WorkerInterface $workerInterface,
        OfficerInterface $officerInterface,
        ServiceProviderQualificationInterface $serviceProviderQualificationInterface,
        FiscalYearInterface $fiscalYear,
    ) {
        $this->serviceProviderQualification = $serviceProviderQualificationInterface;
        $this->officer = $officerInterface;
        $this->worker = $workerInterface;
        $this->serviceProvider = $serviceProviderInterface;
        $this->service = $service;
        $this->serviceProviderProject = $serviceProviderProject;
        $this->executorProject = $executorProject;
        $this->fiscalYear = $fiscalYear;
    }

    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $executorProjects = $this->executorProject->customPaginate($request, 10);
        $fiscalYears = $this->fiscalYear->get();

        return view('pages.service-provider.work-package', compact(
            'executorProjects',
            'fiscalYears'
        ));
    }

    /**
     * store
     *
     * @return JsonResponse
     */
    public function store(ServiceProviderProjectRequest $request, ExecutorProject $executorProject)
    {
        if (!$request->progres) $request->merge(['progres' => 0]);
        if (!$request->date_finish) $request->merge(['date_finish' => $request->date_start]);
        $request->merge(['executor_project_id' => $executorProject->id]);
        $serviceProviderProjects = $this->serviceProviderProject->search($request);
        $service = $this->service->store($request, $serviceProviderProjects, $executorProject);
        if ($service) {
            $this->serviceProviderProject->store($service);
            $progres = 0;
            foreach ($serviceProviderProjects as $serviceProviderProject) {
                $progres += $serviceProviderProject->progres;
            }
            $this->executorProject->update($executorProject->id, ['physical_progress' => ($progres + $request->progres)]);
            if ($request->is('api/*')) {
                return ResponseHelper::success(null, trans('alert.add_success'));
            } else {
                return redirect()->back()->with('success', trans('alert.add_success'));
            }
        } else {
            $progres = $executorProject->physical_progress;
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, "Project yang anda kerjakan saat ini sudah mencapai " . $progres . "% jadi anda hanya bisa menambahkan progress maksimal " . 100 - $progres . "%");
            } else {
                return redirect()->back()->withErrors("Project yang anda kerjakan saat ini sudah mencapai " . $progres . "% jadi anda hanya bisa menambahkan progress maksimal " . 100 - $progres . "%");
            }
        }
    }

    /**
     * show
     *
     * @param  mixed $service_provider_project
     * @return void
     */
    public function show(ServiceProviderProject $service_provider_project)
    {
        return ResponseHelper::success(ServiceProviderProjectResource::make($service_provider_project));
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
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * destroy
     *
     * @param  mixed $service_provider_project
     * @return void
     */
    public function destroy(ServiceProviderProject $service_provider_project, Request $request)
    {
        $this->service->remove($service_provider_project->file);
        $this->serviceProviderProject->delete($service_provider_project->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
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
        return $this->service->download($service_provider_project);
    }

    /**
     * allServiceProvider
     *
     * @param  mixed $request
     * @return void
     */
    public function allServiceProvider(Request $request)
    {
        $data = $this->serviceProvider->customPaginate($request, 15);
        $data->appends(['service_provider' => $request->service_provider]);
        return view('pages.service-provider.servic-provider', ['serviceProviders' => $data]);
    }

    /**
     * projectDetail
     *
     * @param  mixed $service_provider
     * @param  mixed $request
     * @return View
     */
    public function projectDetail(ServiceProvider $service_provider, Request $request): View
    {
        $serviceProviders = $this->serviceProvider->show($service_provider->id);
        $serviceProviderQualifications = $this->serviceProviderQualification->search($request);
        $officers = $this->officer->search($request);
        $workers = $this->worker->search($request);
        $verifications = $service_provider->verification;
        $amendmentDeeps = $service_provider->amendmentDeed;
        $foundingDeeps = $service_provider->foundingDeed;
        return view('pages.service-provider.detail', ['serviceProvider' => $serviceProviders, 'serviceProviderQualifications' => $serviceProviderQualifications, 'officers' => $officers, 'workers' => $workers, 'verifications' => $verifications, 'amendmentDeeps' => $amendmentDeeps, 'foundingDeeps' => $foundingDeeps]);
    }
}
