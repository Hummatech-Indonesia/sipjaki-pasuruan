<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AccidentInterface;
use App\Http\Requests\DinasRequest;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    private UserInterface $user;
    private FiscalYearInterface $fiscalYear;
    private ExecutorProjectInterface $executorProject;
    private AccidentInterface $accident;

    public function __construct(
        DinasInterface $dinas,
        UserInterface $user,
        ExecutorProjectInterface $executorProject,
        FiscalYearInterface $fiscalYear,
        AccidentInterface $accident,
    )
    {
        $this->user = $user;
        $this->dinas = $dinas;
        $this->executorProject = $executorProject;
        $this->fiscalYear = $fiscalYear;
        $this->accident = $accident;
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
        $fiscalYears = $this->fiscalYear->get();
        foreach ($executorProjects as $executorProject) {
            $accidentCount += $executorProject->accidents->count();
        }


        $amounts = [];
        $categories = [];

        foreach($this->fiscalYear->getLastYear() as $fiscalYear)
        {
            $amount = $this->accident->getByYear($fiscalYear->name)->count();
            $category = $fiscalYear->name;

            array_push($amounts,$amount);
            array_push($categories,$category);
        }

        return view('pages.dinas.dashboard',compact(
            'accidentCount',
            'executorProjects',
            'executorProjectCount',
            'executorProjectActive',
            'fiscalYears',
            'amounts',
            'categories'
        ));
    }

    public function accidentLandingPage(Request $request): View
    {
        $projects = $this->dinas->countAccidentByDinas($request);
        $total_accident = 0;
        foreach ($projects as $project) {
            $project->total_accident = 0;
            foreach ($project->consultantProjects as $consultantProject) {
                foreach($consultantProject->executorProjects as $executorProject){
                    $project->total_accident += $executorProject->accidents->count();
                    $total_accident += $project->total_accident;
                }
                
            }
        }
        return view('kecelakaan', ['data' => $projects, 'total_accident' => $total_accident]);
    }
}
