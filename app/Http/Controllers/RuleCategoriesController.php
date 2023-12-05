<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\RuleCategoriesInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\RuleCategoriesRequest;
use App\Http\Resources\RuleCategoriesResource;
use App\Models\RuleCategory;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class RuleCategoriesController extends Controller
{
    use PaginationTrait;

    private RuleCategoriesInterface $ruleCategory;
    public function __construct(RuleCategoriesInterface $ruleCategory)
    {
        $this->ruleCategory = $ruleCategory;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ruleCategories = $this->ruleCategory->customPaginate($request, $request->pagination);
        $data['paginate'] = $this->customPaginate($ruleCategories->currentPage(), $ruleCategories->lastPage());
        $data['data'] = RuleCategoriesResource::collection($ruleCategories);
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
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(RuleCategoriesRequest $request)
    {
        $this->ruleCategory->store($request->validated());
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
    public function update(RuleCategoriesRequest $request, RuleCategory $ruleCategory)
    {
        $this->ruleCategory->update($ruleCategory->id, $request->validated());
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuleCategory $ruleCategory)
    {
        $this->ruleCategory->delete($ruleCategory->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
