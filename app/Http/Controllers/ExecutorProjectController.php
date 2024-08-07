<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Contracts\Interfaces\ContractCategoryInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\FundSourceInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Enums\StatusEnum;
use App\Http\Requests\ExecutorProjectRequest;
use App\Http\Requests\UploadExecutorRequest;
use App\Models\ExecutorProject;
use App\Models\Project;
use App\Services\ExecutorProjectService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExecutorProjectController extends Controller
{
    private ExecutorProjectInterface $executorProject;
    private ExecutorProjectService $service;
    private FiscalYearInterface $fiscalYear;
    private FundSourceInterface $fundSource;
    private ServiceProviderInterface $serviceProvider;
    private ConsultantProjectInterface $consultantProject;
    private ContractCategoryInterface $contractCategory;
    private DinasInterface $dinas;

    public function __construct(
        ExecutorProjectInterface $executorProjectInterface,
        ExecutorProjectService $service,
        FiscalYearInterface $fiscalYear,
        FundSourceInterface $fundSource,
        ServiceProviderInterface $serviceProvider,
        ConsultantProjectInterface $consultantProject,
        ContractCategoryInterface $contractCategory,
        DinasInterface $dinas,
    ) {
        $this->executorProject = $executorProjectInterface;
        $this->service = $service;
        $this->fiscalYear = $fiscalYear;
        $this->fundSource = $fundSource;
        $this->serviceProvider = $serviceProvider;
        $this->consultantProject = $consultantProject;
        $this->contractCategory = $contractCategory;
        $this->dinas = $dinas;
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
        $fundSources = $this->fundSource->get();
        $executors = $this->serviceProvider->getExecutor();
        $consultantProjects = $this->consultantProject->get();
        $contractCategories = $this->contractCategory->get();
        $dinases = $this->dinas->get();

        return view('pages.dinas.work-package', compact(
            'executorProjects',
            'fiscalYears',
            'fundSources',
            'executors',
            'consultantProjects',
            'contractCategories',
            'dinases'
        ));
    }

    public function update(ExecutorProjectRequest $request, ExecutorProject $executorProject)
    {
        $this->executorProject->update($executorProject->id, $request->validated());

        return redirect()->back()->with('success', trans('alert.update_success'));
    }


    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $project
     * @return void
     */
    public function store(ExecutorProjectRequest $request)
    {
        $request->validated();
        $request["dinas_id"] = auth()->user()->dinas->id;
        $this->executorProject->store($request->toArray());
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    public function upload(UploadExecutorRequest $request, ExecutorProject $executorProject)
    {
        $data = $this->service->store($request, $executorProject);
        // dd($data);
        $this->executorProject->update($executorProject->id, $data);

        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * markDone
     *
     * @param  mixed $executorProject
     * @return RedirectResponse
     */
    public function markDone(ExecutorProject $executorProject): RedirectResponse
    {
        $this->executorProject->update($executorProject->id, ['status' => StatusEnum::NONACTIVE->value]);

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
        return response()->download(storage_path('app/public/' . $executorProject->contract), 'Berkas Kontrak ' . $executorProject->name . '.' . $filePath['extension']);
    }

    /**
     * downloadContract
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadMailOrder(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->mail_order, PATHINFO_EXTENSION));
        return response()->download(storage_path('app/public/' . $executorProject->mail_order), 'Berkas Surat Pesanan ' . $executorProject->name . '.' . $filePath['extension']);
    }

    /**
     * downloadContract
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadPcmMinutes(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->pcm_minutes, PATHINFO_EXTENSION));
        return response()->download(storage_path('app/public/' . $executorProject->pcm_minutes), 'Berkas Berita Acara PCM ' . $executorProject->name . '.' . $filePath['extension']);
    }

    /**
     * downloadContract
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadInvoices(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->invoices, PATHINFO_EXTENSION));
        return response()->download(storage_path('app/public/' . $executorProject->invoices), 'Berkas Invoice ' . $executorProject->name . '.' . $filePath['extension']);
    }

    /**
     * downloadContract
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadShopDrawing(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->shop_drawing, PATHINFO_EXTENSION));
        return response()->download(storage_path('app/public/' . $executorProject->shop_drawing), 'Berkas Shop Drawing ' . $executorProject->name . '.' . $filePath['extension']);
    }

    /**
     * downloadContract
     *
     * @param  mixed $executorProject
     * @return void
     */
    public function downloadAsbuildDrading(ExecutorProject $executorProject)
    {
        $filePath = pathinfo(basename($executorProject->asbuild_drawing, PATHINFO_EXTENSION));
        return response()->download(storage_path('app/public/' . $executorProject->asbuild_drawing), 'Berkas Asbuild Drawing ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->administrative_minutes), 'Berkas Berita Acara Administrasi ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->report), 'Berkas Laporan ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->minutes_of_disbursement), 'Berkas Berita Acara Pencairan ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->uitzet_minutes), 'Berkas Berita Uitzet ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->mutual_check_0), 'Berkas Mutual Check 0% ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->mutual_check_100), 'Berkas Mutual Check 100% ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->p1_meeting_minutes), 'Berkas Berita Acara P1 ' . $executorProject->name . '.' . $filePath['extension']);
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

        return response()->download(storage_path('app/public/' . $executorProject->p2_meeting_minutes), 'Berkas Berita Acara P2 ' . $executorProject->name . '.' . $filePath['extension']);
    }

    public function destroy(ExecutorProject $executorProject)
    {
        $this->executorProject->delete($executorProject->id);

        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
