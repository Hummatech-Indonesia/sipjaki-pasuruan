<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AccidentInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Enums\StatusEnum;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{

    private ServiceProviderInterface $serviceProvider;
    private DinasInterface $dinas;
    private ProjectInterface $project;
    private AccidentInterface $accident;


    public function __construct(
        ServiceProviderInterface $serviceProvider,
        DinasInterface $dinas,
        ProjectInterface $project,
        AccidentInterface $accident
    )
    {
        $this->serviceProvider = $serviceProvider;
        $this->dinas = $dinas;
        $this->project = $project;
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
        $project = $this->project->count(null);
        $accident = $this->accident->count(null);
        $activeProjects = $this->project->customPaginate($request,15);
        $activeProjects->appends(['name' => $request->name]);

        return view('pages.dasboard',compact('dinas','serviceProvider','project','accident','activeProjects'));
    }
}
