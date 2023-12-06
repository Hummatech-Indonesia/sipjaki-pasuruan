<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FundSourceInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\FundSourceRequest;
use App\Http\Resources\FundSourceResource;
use App\Models\FundSource;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class FundSourceController extends Controller
{
    use PaginationTrait;
    private FundSourceInterface $fundSource;

    public function __construct(FundSourceInterface $fundSource)
    {
        $this->fundSource = $fundSource;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fundSources = $this->fundSource->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($fundSources->currentPage(), $fundSources->lastPage());
            $data['data'] = FundSourceResource::collection($fundSources);
            return ResponseHelper::success($data);
        } else {
            return view('pages.source-fund');
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
    public function store(FundSourceRequest $request)
    {
        $this->fundSource->store($request->validated());
        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.add_success'));
        }
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
    public function update(FundSourceRequest $request, FundSource $fundSource)
    {
        $this->fundSource->update($fundSource->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundSource $fundSource, Request $request)
    {
        $this->fundSource->delete($fundSource->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
