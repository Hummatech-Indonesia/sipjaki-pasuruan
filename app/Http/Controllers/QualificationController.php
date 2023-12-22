<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\QualificationRequest;
use App\Http\Resources\QualificationResource;
use App\Contracts\Interfaces\QualificationInterface;
use App\Http\Requests\QualificationUpdateRequest;
use App\Services\QualificationService;

class QualificationController extends Controller
{
    private QualificationInterface $qualification;
    private QualificationService $service;

    public function __construct(QualificationInterface $qualification, QualificationService $service)
    {
        $this->qualification = $qualification;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View | JsonResponse
    {

        $qualifications = $this->qualification->customPaginate($request, 15);
        $qualifications->appends(['name' => $request->name]);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($qualifications->currentPage(), $qualifications->lastPage());
            $data['data'] = QualificationResource::collection($qualifications);
            return ResponseHelper::success($data, trans('alert.get_success'));
        } else {

            $name = $request->name;
            return view('pages.qualification', compact('qualifications', 'name'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QualificationRequest $request): RedirectResponse | JsonResponse
    {
        $this->qualification->store($this->service->store($request));

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Qualification $qualification): View | JsonResponse
    {

        $qualification = $this->qualification->show($qualification->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success($qualification);
        } else {
            return view('pages.sub-qualification', compact('qualification'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QualificationUpdateRequest $request, Qualification $qualification): RedirectResponse | JsonResponse
    {
        $this->qualification->update($qualification->id, $this->service->update($request, $qualification));

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(qualification $qualification, Request $request)
    {
        $this->qualification->delete($qualification->id);

        if ($request->is('api/*')) {

            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {

            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * listQualifications
     *
     * @return JsonResponse
     */
    public function listQualifications(): JsonResponse
    {
        return ResponseHelper::success($this->qualification->get());
    }

    /**
     * detail
     *
     * @param  mixed $qualification
     * @return View
     */
    public function detail(Qualification $qualification, Request $request): View|JsonResponse
    {
        if ($request->is('api/*')) {
            return ResponseHelper::success($qualification);
        } else {
            return View('', ['qualification' => $qualification]);
        }
    }
}
