<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\FiscalYearResource;
use App\Contracts\Interfaces\FiscalYearInterface;

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
        $fiscalYears = $this->fiscalYear->customPaginate($request, $request->pagination);
        
        if( $request->is('api/*')){

            $data['paginate'] = $this->customPaginate($fiscalYears->currentPage(), $fiscalYears->lastPage());
            $data['data'] = FiscalYearResource::collection($fiscalYears);
            return ResponseHelper::success($data);

        }else{

            return view('page',compact('fiscalYears'));
            
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
