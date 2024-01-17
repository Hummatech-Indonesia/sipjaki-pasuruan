<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\AccidentInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;

class AdminController extends Controller
{

    private ServiceProviderInterface $serviceProvider;
    private DinasInterface $dinas;
    private ExecutorProjectInterface $executorProject;
    private AccidentInterface $accident;


    public function __construct(
        ServiceProviderInterface $serviceProvider,
        DinasInterface $dinas,
        ExecutorProjectInterface $executorProject,
        AccidentInterface $accident
    ) {
        $this->serviceProvider = $serviceProvider;
        $this->dinas = $dinas;
        $this->executorProject = $executorProject;
        $this->accident = $accident;
    }
    /**
     * dashboard
     *
     * @return View
     */
    public function dashboard(Request $request): View
    {

        $request->merge([
            'status' => StatusEnum::ACTIVE->value
        ]);

        $dinas = $this->dinas->count(null);
        $serviceProvider = $this->serviceProvider->count(null);
        $project = $this->executorProject->count(null);
        $accident = $this->accident->count(null);
        $activeProjects = $this->executorProject->customPaginate($request, 15);
        $activeProjects->appends(['name' => $request->name]);

        return view('pages.admin.dashboard',compact(
            'dinas',
            'serviceProvider',
            'project',
            'accident',
            'activeProjects',
            'activeProjects'
        ));
    }
}
