<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TrainingRequest;
use App\Http\Resources\TrainingResource;
use App\Contracts\Interfaces\TrainingInterface;
use App\Models\Training;

class TrainingController extends Controller
{

    private TrainingInterface $training;

    public function __construct(TrainingInterface $training)
    {
        $this->training = $training;
    }

 /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View | JsonResponse
    {

        $trainings = $this->training->customPaginate($request, 15);
        
        if( $request->is('api/*')){
            $data['paginate'] = $this->customPaginate($trainings->currentPage(), $trainings->lastPage());
            $data['data'] = TrainingResource::collection($trainings);
            return ResponseHelper::success($data,trans('alert.get_success'));

        }else{

            return view('pages.dinas.training',compact('trainings'));

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingRequest $request): RedirectResponse | JsonResponse
    {
        // dd($request->all());
        $this->training->store($request->validated());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.add_success'));

        }else{
            return redirect()->back()->with('success',trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training) : JsonResponse
    {
        return ResponseHelper::success(TrainingResource::make($training),trans('alert.get_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingRequest $request,Training $training) : RedirectResponse | JsonResponse
    {
        // dd($request->all());
        $this->training->update($training->id,$request->all());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.update_success'));

        }else{
           return redirect()->back()->with('success',trans('alert.update_success'));

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training, Request $request)
    {
        $this->training->delete($training->id);

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.delete_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.delete_success'));

        }
    }
}
