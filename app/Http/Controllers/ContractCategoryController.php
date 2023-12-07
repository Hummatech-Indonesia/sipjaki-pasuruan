<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Models\ContractCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContractCategoryRequest;
use App\Http\Resources\ContractCategoryResource;
use App\Contracts\Interfaces\ContractCategoryInterface;

class ContractCategoryController extends Controller
{
    private ContractCategoryInterface $contractCategory;

    public function __construct(ContractCategoryInterface $contractCategory)
    {
        $this->contractCategory = $contractCategory;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View | JsonResponse
    {

        $contractCategorys = $this->contractCategory->customPaginate($request, 15);
        
        if( $request->is('api/*')){

            $data['paginate'] = $this->customPaginate($contractCategorys->currentPage(), $contractCategorys->lastPage());
            $data['data'] = ContractCategoryResource::collection($contractCategorys);
            return ResponseHelper::success($data,trans('alert.get_success'));

        }else{

            return view('pages.categoryContract',compact('contractCategorys'));

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContractCategoryRequest $request): RedirectResponse | JsonResponse
    {
        $this->contractCategory->store($request->validated());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.add_success'));

        }else{
            return redirect()->back()->with('success',trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContractCategory $contractCategory) : JsonResponse
    {
        return ResponseHelper::success(contractCategoryResource::make($contractCategory),trans('alert.get_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContractCategoryRequest $request, ContractCategory $category_contract) : RedirectResponse | JsonResponse
    {
        $this->contractCategory->update($category_contract->id,$request->all());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.update_success'));

        }else{
            return redirect()->back()->with('success',trans('alert.update_success'));

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractCategory $category_contract, Request $request)
    {
        $this->contractCategory->delete($category_contract->id);

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.delete_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.delete_success'));

        }
    }
}
