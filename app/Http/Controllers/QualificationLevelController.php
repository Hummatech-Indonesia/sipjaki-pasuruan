<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Models\QualificationLevel;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\QualificationResource;
use App\Http\Requests\QualificationLevelRequest;
use App\Http\Resources\QualificationLevelResource;
use App\Contracts\Interfaces\QualificationLevelInterface;
use App\Models\Qualification;

class QualificationLevelController extends Controller
{
    private QualificationLevelInterface $qualificationLevel;

    public function __construct(QualificationLevelInterface $qualificationLevel)
    {
        $this->qualificationLevel = $qualificationLevel;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View | JsonResponse
    {

        $qualifications = $this->qualificationLevel->customPaginate($request, 15);

        if( $request->is('api/*')){

            $data['paginate'] = $this->customPaginate($qualifications->currentPage(), $qualifications->lastPage());
            $data['data'] = QualificationLevelResource::collection($qualifications);
            return ResponseHelper::success($data,trans('alert.get_success'));

        }else{

            return view('pages.sub-qualification',compact('qualifications'));

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QualificationLevelRequest $request,Qualification $qualification): RedirectResponse | JsonResponse
    {
        $data = $request->validated();
        $data['qualification_id'] = $qualification->id;
        $this->qualificationLevel->store($data);

        if( $request->is('api/*')){
            return ResponseHelper::success(null,trans('alert.add_success'));
        }else{
            return redirect()->back()->with('success',trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(QualificationLevel $qualificationLevel) : JsonResponse
    {
        return ResponseHelper::success(QualificationResource::make($qualificationLevel),trans('alert.get_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QualificationLevelRequest $request,QualificationLevel $qualificationLevel) : RedirectResponse | JsonResponse
    {
        $this->qualificationLevel->update($qualificationLevel->id, $request->all());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.update_success'));

        }else{

           return redirect()->back()->with('success',trans('alert.update_success'));

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QualificationLevel $qualificationLevel, Request $request)
    {
        $this->qualificationLevel->delete($qualificationLevel->id);

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.delete_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.delete_success'));

        }
    }

    /**
     * listQualificationLevel
     *
     * @param  mixed $request
     * @param  mixed $qualification
     * @return JsonResponse
     */
    public function listQualificationLevel(Request $request, QualificationLevel $qualification): JsonResponse
    {
        $request->merge(['qualification_id' => $qualification->id]);
        return ResponseHelper::success(QualificationLevelResource::collection($this->qualificationLevel->search($request)));
    }
}
