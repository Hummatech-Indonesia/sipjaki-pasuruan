<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AccidentInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\AccidentRequest;
use App\Http\Resources\AccidentResource;
use App\Models\Accident;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    private AccidentInterface $accident;
    private ExecutorProjectInterface $executorProject;
    private FiscalYearInterface $fiscalYear;

    public function __construct(FiscalYearInterface $fiscalYear,AccidentInterface $accidentInterface, ExecutorProjectInterface $executorProject)
    {
        $this->accident = $accidentInterface;
        $this->executorProject = $executorProject;
        $this->fiscalYear = $fiscalYear;
    }
    /**
     * index
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse|View
    {

        $fiscalYears = $this->fiscalYear->get();
        $accidents = $this->accident->customPaginate($request, 15);
        $executorProjects = $this->executorProject->get();

        return view('pages.dinas.accident', compact('accidents', 'executorProjects','fiscalYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function store(AccidentRequest $request)
    {
        $this->accident->store($request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * show
     *
     * @param  mixed $accident
     * @return JsonResponse
     */
    public function show(Accident $accident): JsonResponse
    {
        return ResponseHelper::success(AccidentResource::make($accident));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $accident
     * @return JsonResponse
     */
    public function update(AccidentRequest $request, Accident $accident)
    {
        $this->accident->update($accident->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * destroy
     *
     * @param  mixed $accident
     * @return JsonResponse
     */
    public function destroy(Request $request, Accident $accident)
    {
        $this->accident->delete($accident->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
