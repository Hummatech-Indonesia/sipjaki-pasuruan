<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Contracts\Interfaces\ContractCategoryInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\FundSourceInterface;
use App\Models\Project;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\ProjectResource;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\ServiceProviderProjectInterface;
use App\Enums\TypeOfBusinessEntityEnum;
use App\Exports\ProjectExport;
use App\Http\Requests\UploadFileProjectRequest;
use App\Models\ExecutorProject;
use App\Services\ProjectService;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    private ProjectService $service;
    private ServiceProviderInterface $serviceProvider;
    private FundSourceInterface $fundSource;
    private ContractCategoryInterface $contractCategory;
    private ServiceProviderProjectInterface $serviceProviderProject;
    private ExecutorProjectInterface $executorProject;
    private ConsultantProjectInterface $consultantProject;
    private DinasInterface $dinas;

    public function __construct(
        ServiceProviderInterface $serviceProvider,
        FundSourceInterface $fundSource,
        ContractCategoryInterface $contractCategory,
        ServiceProviderProjectInterface $serviceProviderProjectInterface,
        ProjectService $service,
        ExecutorProjectInterface $executorProjectInterface,
        ConsultantProjectInterface $consultantProjectInterface,
        DinasInterface $dinas
    ) {
        $this->dinas = $dinas;
        $this->consultantProject = $consultantProjectInterface;
        $this->executorProject = $executorProjectInterface;
        $this->service = $service;
        $this->serviceProviderProject = $serviceProviderProjectInterface;
        $this->serviceProvider = $serviceProvider;
        $this->fundSource = $fundSource;
        $this->contractCategory = $contractCategory;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View | JsonResponse
    {

        $projects = $this->project->customPaginate($request, 15);

        if ($request->is('api/*')) {

            $data['paginate'] = $this->customPaginate($projects->currentPage(), $projects->lastPage());
            $data['data'] = ProjectResource::collection($projects);
            return ResponseHelper::success($data, trans('alert.get_success'));
        } else {

            $consultants = $this->serviceProvider->getConsultant();
            $executors = $this->serviceProvider->getExecutor();
            $fundSources = $this->fundSource->get();
            $contractCategories = $this->contractCategory->get();
            $dinases = $this->dinas->get();
            $requestDinas = $request->dinas_id;
            $name = $request->name;
            $year = $request->year;
            $status = $request->status;
            return view('pages.dinas.work-package', compact('name', 'status', 'year', 'projects', 'consultants', 'executors', 'fundSources', 'contractCategories', 'dinases', 'requestDinas'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request): RedirectResponse | JsonResponse
    {
        $data = $request->validated();
        if ($data['physical_progress'] == null) {
            $data['physical_progress'] = 0;
        }
        if ($data['finance_progress'] == null) {
            $data['finance_progress'] = 0;
        }
        $id = $this->project->store($data)->id;
        $data['project_id'] = $id;
        $data['name_package'] = 'Paket Konsultan ' . auth()->user()->name;
        $this->consultantProject->store($data);
        $this->executorProject->store($data);
        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): JsonResponse
    {
        return ResponseHelper::success(ProjectResource::make($project), trans('alert.get_success'));
    }

    /**
     * detailProjectDinas
     *
     * @param  mixed $project
     * @return View
     */
    public function detailProjectDinas(Project $project): View
    {
        return view('pages.dinas.detail-project', ['project' => $project]);
    }

    /**
     * projectDetail
     *
     * @param  mixed $project
     * @return View
     */
    public function projectDetail(ExecutorProject $executorProject): View
    {
        $data = collect($executorProject->serviceProviderProjects);
        $data = $data->sortBy('week');
        $dataWeekExecutor = $data->filter(function ($item) {
            return !$item->page && $item->executor_type == 'executor';
        });
        $dataWeekConsultant = $data->filter(function ($item) {
            return !$item->page && $item->executor_type == 'consultant';
        });
        $dataDaysConsultant = $data->filter(function ($item) {
            return $item->page && $item->executor_type == 'consultant';
        });
        $dataDaysExecutor = $data->filter(function ($item) {
            return $item->page && $item->executor_type == 'executor';
        });
        return view('pages.service-provider.detail-work-package', compact(
            'executorProject',
            'dataWeekExecutor',
            'dataDaysExecutor',
            'dataWeekConsultant',
            'dataDaysConsultant'
        ));
    }

    /**
     * projectDetail
     *
     * @param  mixed $project
     * @return View
     */
    public function projectConsultanDetail(Project $project): View
    {
        $listProviderProject = $this->serviceProviderProject->getByProject($project->id);
        return view('pages.service-provider.detail-work-package', ['project' => $project, 'serviceProviderProject' => $listProviderProject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project): RedirectResponse | JsonResponse
    {
        $this->project->update($project->id, $request->validated());

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Request $request)
    {
        $this->project->delete($project->id);

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * listProjects
     *
     * @return JsonResponse
     */
    public function listProjects(): JsonResponse
    {
        return ResponseHelper::success(ProjectResource::collection($this->project->get()));
    }

    /**
     * uploadFileKonsultan
     *
     * @param  mixed $request
     * @param  mixed $project
     * @return void
     */
    public function uploadFileKonsultan(UploadFileProjectRequest $request, Project $project)
    {
        $this->project->update($project->id, $this->service->store($request, $project));
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * history
     *
     * @return View
     */
    public function history(): View
    {
        if (auth()->user()->serviceProvider->type == TypeOfBusinessEntityEnum::CONSULTANT) {
            $projects = $this->project->historyConsultan();
            return view('', ['projects' => $projects]);
        } else {
            $projects = $this->project->historyExecutor();
            return view('', ['projects' => $projects]);
        }
    }

    /**
     * myProject
     *
     * @return View
     */
    public function myProject(): View
    {
        if (auth()->user()->serviceProvider->type == TypeOfBusinessEntityEnum::CONSULTANT) {
            $projects = $this->project->projectConsultan();
            return view('', ['projects' => $projects]);
        } else {
            $projects = $this->project->projectExecutor();
            return view('', ['projects' => $projects]);
        }
    }

    /**
     * export
     *
     * @return void
     */
    public function export(Request $request)
    {
        return Excel::download(new ProjectExport($request, $this->executorProject), 'Paket Pekerjaan.xlsx');
    }

    /**
     * exportPdf
     *
     * @return void
     */
    public function exportPdf(Request $request)
    {
        $data['projects'] = $this->executorProject->search($request);
        $pdf = Pdf::loadView('exports.projects-pdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Paket Pekerjaan' . '.pdf');
    }
}
