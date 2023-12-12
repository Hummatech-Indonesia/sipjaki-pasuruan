<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SectionInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\SectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    use PaginationTrait;

    private SectionInterface $section;

    public function __construct(SectionInterface $section)
    {
        $this->section = $section;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sections = $this->section->customPaginate($request, 10);

        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($sections->currentPage(), $sections->lastPage());
            $data['data'] = SectionResource::collection($sections);
            return ResponseHelper::success($data);
        } else {
            $name = $request->name;
            return view('pages.settings-sections', compact('sections', 'name'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(SectionRequest $request)
    {
        $this->section->store($request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, Section $section)
    {
        $this->section->update($section->id, $request->validated());

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section, Request $request)
    {
        $this->section->delete($section->id);

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
