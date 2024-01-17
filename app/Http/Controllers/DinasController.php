<?php

namespace App\Http\Controllers;

use App\Http\Requests\DinasRequest;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    private UserInterface $user;
    private ExecutorProjectInterface $executorProject;

    public function __construct(
        DinasInterface $dinas,
        UserInterface $user,
        ExecutorProjectInterface $executorProject,
    )
    {
        $this->user = $user;
        $this->dinas = $dinas;
        $this->executorProject = $executorProject;
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
     * dashboard
     *
     * @return JsonResponse
     */
    public function dashboard(Request $request): JsonResponse|View
    {
        $request->merge([
            'status' => 'active'
        ]);
        $accidentCount = 0;
        $executorProjects = $this->executorProject->search($request);
        $executorProjectCount = $this->executorProject->count(null);
        $executorProjectActive = $this->executorProject->count(['status' => 'active']);
        foreach ($executorProjects as $executorProject) {
            $accidentCount += $executorProject->accidents->count();
        }

        return view('pages.dinas.dashboard',compact(
            'accidentCount',
            'executorProjects',
            'executorProjectCount',
            'executorProjectActive'
        ));
    }

    public function accidentLandingPage(Request $request): View
    {
        $data = $this->dinas->countAccidentByDinas($request);
        $total_accident = 0;
        foreach ($data as $projects) {
            $projects->total_accident = 0;
            foreach ($projects->projects as $project) {
                $projects->total_accident += $project->accidents->count();
                $total_accident += $project->total_accident;
            }
        }
        return view('kecelakaan', ['data' => $data, 'total_accident' => $total_accident]);
    }
}
