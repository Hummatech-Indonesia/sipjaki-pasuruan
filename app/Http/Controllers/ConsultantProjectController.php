<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ConsultantProjectService;
use App\Http\Requests\ConsultantProjectRequest;
use App\Http\Requests\ConsultantProjectUpdateRequest;
use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Contracts\Interfaces\ContractCategoryInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\FundSourceInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\ProjectResource;
use App\Models\ConsultantProject;

class ConsultantProjectController extends Controller
{
    private ConsultantProjectInterface $consultantProject;
    private ConsultantProjectService $service;
    private DinasInterface $dinas;
    private FundSourceInterface $fundSource;
    private ContractCategoryInterface $contractCategory;
    private ServiceProviderInterface $serviceProvider;
    private FiscalYearInterface $fiscalYear;
    private ExecutorProjectInterface $executorProject;

    public function __construct(
        ConsultantProjectInterface $consultantProject,
        ConsultantProjectService $consultantProjectService,
        DinasInterface $dinas,
        FundSourceInterface $fundSource,
        ContractCategoryInterface $contractCategory,
        ServiceProviderInterface $serviceProvider,
        FiscalYearInterface $fiscalYear,
        ExecutorProjectInterface $executorProject,
        )
    {
        $this->consultantProject = $consultantProject;
        $this->service = $consultantProjectService;
        $this->dinas = $dinas;
        $this->fundSource = $fundSource;
        $this->contractCategory = $contractCategory;
        $this->serviceProvider = $serviceProvider;
        $this->fiscalYear = $fiscalYear;
        $this->executorProject = $executorProject;
    }
    /**
     * Display a listing of the resource.
     * @return void
     */
    public function index(Request $request)
    {
        $consultantProjects = $this->consultantProject->customPaginate($request, 10);
        $fiscalYears = $this->fiscalYear->get();

        return view('pages.service-provider.consultant-package',compact(
            'consultantProjects',
            'fiscalYears'
        ));   
    }

    public function show(Request $request,ConsultantProject $consultantProject)
    {
        $request->merge([
            'consultant' => $consultantProject->id
        ]);
        
        $fundSources = $this->fundSource->get();
        $contractCategories = $this->contractCategory->get();
        $dinases = $this->dinas->get();
        $fiscalYears = $this->fiscalYear->get();
        $consultants = $this->serviceProvider->getConsultant();
        $executorProjects = $this->executorProject->customPaginate($request,15);
        return view('pages.consultant-project.index',compact(
            'consultantProject',
            'fundSources',
            'contractCategories',
            'dinases',
            'fiscalYears',
            'consultants',
            'executorProjects'
        ));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $project
     * @return void
     */
    public function store(ConsultantProjectRequest $request)
    {

        $this->consultantProject->store($request->validated());

        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update(ConsultantProjectUpdateRequest $request,ConsultantProject $consultantProject)
    {
        $this->consultantProject->update($consultantProject->consultantProject->id, $request->validated());
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**d
     * index
     *
     * @return void
     */
    public function consultantProject(Request $request)
    {
        $consultantProjects = $this->consultantProject->customPaginate($request, 10);
        $fiscalYears = $this->fiscalYear->get();

        return view('pages.service-provider.consultant-package',compact(
            'consultantProjects',
            'fiscalYears'
        ));
        
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
        return response()->download(storage_path('app/' . $consultantProject->contract), $consultantProject->project->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/' . $consultantProject->administrative_minutes), $consultantProject->project->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/' . $consultantProject->report), $consultantProject->project->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/' . $consultantProject->minutes_of_disbursement), $consultantProject->project->name . '.' . $filePath['extension']);
    }

    /**
     * downloadMinutesOfDisbursement
     *
     * @param  mixed $consultantProject
     * @return void
     */
    public function downloadMinutesOfHandOver(ConsultantProject $consultantProject)
    {
        $filePath = pathinfo(basename($consultantProject->minutes_of_hand_over, PATHINFO_EXTENSION));

        return response()->download(storage_path('app/' . $consultantProject->minutes_of_hand_over), $consultantProject->project->name . '.' . $filePath['extension']);
    }
}
