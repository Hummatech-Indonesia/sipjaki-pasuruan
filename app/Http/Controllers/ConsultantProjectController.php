<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
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
use App\Exports\ConsultantProjectExport;
use App\Helpers\ResponseHelper;
use App\Http\Requests\UploadConsultantRequest;
use App\Http\Resources\ProjectResource;
use App\Models\ConsultantProject;
use Illuminate\Http\RedirectResponse;

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
    ) {
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
        $data['fundSources'] =  $this->fundSource->get();
        $data['contractCategories'] = $this->contractCategory->get();
        $data['dinases'] = $this->dinas->get();
        $data['fiscalYears'] = $this->fiscalYear->get();
        $data['consultants'] = $this->serviceProvider->getConsultant();
        $data['consultantProjects'] = $this->consultantProject->customPaginate($request,15);

        return view('pages.consultant-project.index',$data);
    }

    public function show(Request $request, ConsultantProject $consultantProject)
    {
        $request->merge([
            'consultant' => $consultantProject->id
        ]);

        $data['consultantProject'] = $consultantProject;
        $data['fundSources'] =  $this->fundSource->get();
        $data['contractCategories'] = $this->contractCategory->get();
        $data['dinases'] = $this->dinas->get();
        $data['fiscalYears'] = $this->fiscalYear->get();
        $data['consultants'] = $this->serviceProvider->getConsultant();
        $data['executorProjects'] = $this->executorProject->customPaginate($request, 15);

        return view('pages.consultant-project.index',$data);
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
    public function update(ConsultantProjectRequest $request, ConsultantProject $consultantProject)
    {
        $this->consultantProject->update($consultantProject->id, $request->validated());

        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * upload
     *
     * @param  mixed $request
     * @param  mixed $consultantProject
     * @return RedirectResponse
     */
    public function upload(UploadConsultantRequest $request, ConsultantProject $consultantProject): RedirectResponse
    {
        $data = $this->service->store($request, $consultantProject);

        $this->consultantProject->update($consultantProject->id, $data);

        return redirect()->back()->with('success', trans('alert.update_success'));
    }


    /**d
     * index
     *
     * @return void
     */
    public function consultantProject(Request $request)
    {
        $data['consultantProjects'] = $this->consultantProject->customPaginate($request, 10);
        $data['fiscalYears'] = $this->fiscalYear->get();
        $data['dinases'] = $this->dinas->get();

        return view('pages.service-provider.consultant-package', $data);
    }

    public function destroy(ConsultantProject $consultantProject)
    {
        $this->consultantProject->delete($consultantProject->id);

        return redirect()->back()->with('success',trans('alert.delete_success'));
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
        return response()->download(storage_path('app/public/' . $consultantProject->contract), 'Berkas Kontrak ' . $consultantProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $consultantProject->administrative_minutes), ' Berkas Berita Acara Administrasi ' . $consultantProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $consultantProject->report), 'Berkas Laporan ' .  $consultantProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $consultantProject->minutes_of_disbursement), 'Berkas Berita Acara Pencairan ' . $consultantProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $consultantProject->minutes_of_hand_over), 'Berkas Berita Acara Serah Terima ' . $consultantProject->name . '.' . $filePath['extension']);
    }

    /**
     * exportPdf
     *
     * @return void
     */
    public function exportPdf(Request $request)
    {
        $data['consultantProjects'] = $this->consultantProject->search($request);
        $pdf = Pdf::loadView('exports.consultant-package-pdf', $data);

        return $pdf->download('Paket Konsultan.pdf');
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new ConsultantProjectExport($request, $this->consultantProject), 'Paket Konsultan.xlsx');
    }
}
