<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\RuleCategoriesInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\RuleCategoriesRequest;
use App\Http\Resources\RuleCategoriesResource;
use App\Models\RuleCategory;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class RuleCategoryController extends Controller
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
        $ruleCategories = $this->ruleCategory->customPaginate($request, 10);
        $ruleCategories->appends(['name' => $request->name]);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($ruleCategories->currentPage(), $ruleCategories->lastPage());
            $data['data'] = RuleCategoriesResource::collection($ruleCategories);
            return ResponseHelper::success($data);
        } else {
            $name = $request->name;
            return view('pages.rule-category', compact('ruleCategories','name'));
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
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(RuleCategoriesRequest $request)
    {
        $this->ruleCategory->store($request->validated());
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
    public function update(RuleCategoriesRequest $request, RuleCategory $rule_category)
    {
        $this->ruleCategory->update($rule_category->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuleCategory $rule_category,Request $request)
    {
        $this->ruleCategory->delete($rule_category->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
