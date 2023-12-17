<?php

namespace App\Http\Controllers;

use App\Http\Requests\DinasRequest;
use App\Contracts\Interfaces\TypeInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\SectionInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\DinasAccidentResource;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    private SectionInterface $section;
    private TypeInterface $type;
    private UserInterface $user;
    private ProjectInterface $project;

    public function __construct(DinasInterface $dinas, SectionInterface $section, TypeInterface $type, UserInterface $user, ProjectInterface $project)
    {
        $this->user = $user;
        $this->dinas = $dinas;
        $this->section = $section;
        $this->type = $type;
        $this->project = $project;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $dinas = auth()->user()->dinas;
        $sections = $this->section->get();
        $types = $this->type->get();
        return view('pages.profile-opd', [
            'sections' => $sections,
            'types' => $types,
            'dinas' => $dinas
        ]);
    }
    /**
     * update
     *
     * @param  mixed $dinas
     * @param  mixed $request
     * @return void
     */
    public function update(DinasRequest $request)
    {
        $this->user->update(auth()->user()->id, $request->validated());
        $this->dinas->update(auth()->user()->dinas->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * chart
     *
     * @return void
     */
    public function chart()
    {
        $dinases =  $this->dinas->get();
        $data = DinasAccidentResource::collection($dinases);
        return ResponseHelper::success($data);
    }

    /**
     * dashboard
     *
     * @return JsonResponse
     */
    public function dashboard(): JsonResponse|View
    {
        $accident_total = 0;
        $projects = $this->project->getbyId();
        foreach ($projects as $project) {
            $accident_total += $project->accidents->count();
        }
        return ResponseHelper::success(['accident_count' => $accident_total, 'project' => $projects]);
    }
}
