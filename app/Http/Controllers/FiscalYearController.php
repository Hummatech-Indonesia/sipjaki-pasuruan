<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\FiscalYearResource;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Http\Requests\FiscalYearRequest;
use App\Models\FiscalYear;
use Illuminate\Http\RedirectResponse;

class FiscalYearController extends Controller
{

    private FiscalYearInterface $fiscalYear;

    public function __construct(FiscalYearInterface $fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View | JsonResponse
    {

        $fiscalYears = $this->fiscalYear->customPaginate($request, 15);
        $fiscalYears->appends(['name' => $request->name]);
        if( $request->is('api/*')){

            $data['paginate'] = $this->customPaginate($fiscalYears->currentPage(), $fiscalYears->lastPage());
            $data['data'] = FiscalYearResource::collection($fiscalYears);
            return ResponseHelper::success($data,trans('alert.get_success'));

        }else{

            return view('pages.fiscal-year',compact('fiscalYears'));

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FiscalYearRequest $request): RedirectResponse | JsonResponse
    {
        $this->fiscalYear->store($request->validated());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.add_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.add_success'));

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FiscalYear $fiscalYear) : JsonResponse
    {
        return ResponseHelper::success(FiscalYearResource::make($fiscalYear),trans('alert.get_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FiscalYearRequest $request,FiscalYear $fiscalYear) : RedirectResponse | JsonResponse
    {
        $this->fiscalYear->update($fiscalYear->id,$request->all());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.update_success'));

        }else{

           return redirect()->back()->with('success',trans('alert.update_success'));

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FiscalYear $fiscalYear, Request $request)
    {
        $this->fiscalYear->delete($fiscalYear->id);

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.delete_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.delete_success'));

        }
    }

    /**
     * listFiscalYear
     *
     * @return JsonResponse
     */
    public function listFiscalYear(): JsonResponse
    {
        return ResponseHelper::success(FiscalYearResource::collection($this->fiscalYear->get()));
    }
}
