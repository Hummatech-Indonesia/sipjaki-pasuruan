<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassificationInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ClassificationRequest;
use App\Http\Resources\ClassificationResource;
use App\Models\Classification;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    use PaginationTrait;
    private ClassificationInterface $classification;

    public function __construct(ClassificationInterface $classification)
    {
        $this->classification = $classification;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classifications = $this->classification->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($classifications->currentPage(), $classifications->lastPage());
            $data['data'] = ClassificationResource::collection($classifications);
            return ResponseHelper::success($data);
        } else {
            return view('klasifikasi', ['classifications' => $classifications]);
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
    public function store(ClassificationRequest $request)
    {

        $this->classification->store($request->validated());
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
     * @param  mixed $request
     * @param  mixed $classification
     * @return void
     */
    public function update(ClassificationRequest $request, Classification $classification)
    {
        $this->classification->update($classification->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  mixed $classification
     * @return void
     */
    public function destroy(Classification $classification, Request $request)
    {
        $this->classification->delete($classification->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
