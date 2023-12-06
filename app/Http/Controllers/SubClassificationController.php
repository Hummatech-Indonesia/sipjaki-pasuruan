<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubClassificationInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\SubClassificationRequest;
use App\Http\Resources\SubClassificationResource;
use App\Models\Classification;
use App\Models\SubClassification;
use App\Traits\PaginationTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubClassificationController extends Controller
{

    use PaginationTrait;

    private SubClassificationInterface $subClassification;

    public function __construct(SubClassificationInterface $subClassification)
    {
        $this->subClassification = $subClassification;
    }


    /**
     * showSubClassification
     *
     * @param  mixed $request
     * @param  mixed $classification
     * @return void
     */
    public function showSubClassification(Request $request, Classification $classification)
    {
        $request->merge(['classification_id' => $classification->id]);
        $subClassifications = $this->subClassification->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($subClassifications->currentPage(), $subClassifications->lastPage());
            $data['data'] = SubClassificationResource::collection($subClassifications);
            return ResponseHelper::success($data);
        } else {
            return view('pages.classification.detail');
        }
    }


    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $classification
     * @return JsonResponse
     */
    public function store(SubClassificationRequest $request, Classification $classification): JsonResponse | View
    {
        $data = $request->validated();
        $data['classification_id'] = $classification->id;
        $this->subClassification->store($data);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubClassificationRequest $request, SubClassification $sub_classification)
    {
        $this->subClassification->update($sub_classification->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubClassification $sub_classification, Request $request)
    {
        $this->subClassification->delete($sub_classification->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
