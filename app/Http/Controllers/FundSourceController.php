<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FundSourceInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\FundSourceRequest;
use App\Models\FundSource;
use Illuminate\Http\Request;

class FundSourceController extends Controller
{
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
        $data = $this->fundSource->search($request);
        return ResponseHelper::success($data);
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
        return ResponseHelper::success(null, trans('alert.add_success'));
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
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundSource $fundSource)
    {
        $this->fundSource->delete($fundSource->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
