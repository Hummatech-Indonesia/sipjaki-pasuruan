<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Contracts\Interfaces\FaqInterface;
use App\Models\Faq;

class FaqController extends Controller
{

    private FaqInterface $faq;

    public function __construct(FaqInterface $faq)
    {
        $this->faq = $faq;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View | JsonResponse
    {
        $faqs = $this->faq->customPaginate($request,10);
        $faqs->appends(['name' => $request->name]);
        if( $request->is('api/*')){

            // $data['paginate'] = $this->customPaginate($fiscalYears->currentPage(), $fiscalYears->lastPage());
            // $data['data'] = FiscalYearResource::collection($fiscalYears);
            // return ResponseHelper::success($data,trans('alert.get_success'));

        }else{

            $name = $request->name;
            return view('pages.admin.faq',compact('faqs','name'));

        }
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request): RedirectResponse | JsonResponse
    {
        $this->faq->store($request->validated());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.add_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.add_success'));

        }
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Faq $faq) : JsonResponse
    // {
    //     // return ResponseHelper::success(FiscalYearResource::make($fiscalYear),trans('alert.get_success'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request,Faq $faq) : RedirectResponse | JsonResponse
    {
        $this->faq->update($faq->id,$request->validated());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.update_success'));

        }else{

           return redirect()->back()->with('success',trans('alert.update_success'));

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq, Request $request)
    {
        $this->faq->delete($faq->id);

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.delete_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.delete_success'));

        }
    }
}
