<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FiscalYearInterface;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TrainingRequest;
use App\Http\Resources\TrainingResource;
use App\Contracts\Interfaces\TrainingInterface;
use App\Exports\TrainingExport;
use App\Models\Training;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class TrainingController extends Controller
{

    private TrainingInterface $training;
    private FiscalYearInterface $fiscalYear;

    public function __construct(TrainingInterface $training, FiscalYearInterface $fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
        $this->training = $training;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View | JsonResponse
    {
        $trainings = $this->training->customPaginate($request, 15);
        $trainings->appends(['name' => $request->name]);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($trainings->currentPage(), $trainings->lastPage());
            $data['data'] = TrainingResource::collection($trainings);
            return ResponseHelper::success($data, trans('alert.get_success'));
        } else {
            $year = $request->fiscal_year_id;
            $fiscalYears = $this->fiscalYear->get();
            return view('pages.dinas.training', compact('trainings', 'fiscalYears','year'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingRequest $request): RedirectResponse | JsonResponse
    {
        $this->training->store($request->validated());

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training): JsonResponse
    {
        return ResponseHelper::success(TrainingResource::make($training), trans('alert.get_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingRequest $request, Training $training): RedirectResponse | JsonResponse
    {
        // dd($request->all());
        $this->training->update($training->id, $request->all());

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training, Request $request)
    {
        $this->training->delete($training->id);

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * export
     *
     * @param  mixed $request
     * @return void
     */
    public function export(Request $request)
    {
        return Excel::download(new TrainingExport($request), 'pelatihan-' . auth()->user()->name . '.xlsx');
    }
    /**
     * exportPdf
     *
     * @return void
     */
    public function exportPdf(Request $request)
    {
        $data['trainings'] = $this->training->search($request);
        $pdf = Pdf::loadView('exports.training-pdf', $data);

        return $pdf->download('training-' . auth()->user()->name . '.pdf');
    }
}
