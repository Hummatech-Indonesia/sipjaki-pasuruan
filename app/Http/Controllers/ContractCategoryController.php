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

        $contractCategories = $this->contractCategory->customPaginate($request, 15);
        $contractCategories->appends(['name' => $request->name]);
        if( $request->is('api/*')){

            $data['paginate'] = $this->customPaginate($contractCategories->currentPage(), $contractCategories->lastPage());
            $data['data'] = ContractCategoryResource::collection($contractCategories);
            return ResponseHelper::success($data,trans('alert.get_success'));

        }else{

            $name = $request->name;
            return view('pages.categoryContract',compact('contractCategories','name'));

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
    public function update(ContractCategoryRequest $request,ContractCategory $contractCategory) : RedirectResponse | JsonResponse
    {
        $this->contractCategory->update($contractCategory->id,$request->all());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.update_success'));

        }else{
            return redirect()->back()->with('success',trans('alert.update_success'));

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContractCategory $contractCategory, Request $request)
    {
        $this->contractCategory->delete($contractCategory->id);

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.delete_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.delete_success'));

        }
    }
}
