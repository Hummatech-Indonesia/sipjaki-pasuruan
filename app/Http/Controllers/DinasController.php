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
use Illuminate\Http\Request;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    private TypeInterface $type;
    private UserInterface $user;
    private ProjectInterface $project;

    public function __construct(DinasInterface $dinas, TypeInterface $type, UserInterface $user, ProjectInterface $project)
    {
        $this->user = $user;
        $this->dinas = $dinas;
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
        return view('pages.profile-opd', ['dinas' => $dinas]);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all(Request $request)
    {
        $dinass = $this->dinas->customPaginate($request, 15);
        $dinass->appends(['name' => $request->name]);

        // dd($dinass);
        return view('pages.all-agency', compact('dinass'));
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
        $project_total = $this->project->countDinas();
        $countActiveWorker = $this->project->countAllProject();

        return view('pages.dinas.dashboard', ['accident_count' => $accident_total, 'project_count' => $project_total, 'countActiveWorker' => $countActiveWorker, 'projects' => $projects]);
    }
}
