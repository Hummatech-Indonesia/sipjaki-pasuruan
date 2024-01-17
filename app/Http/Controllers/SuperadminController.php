<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AccidentInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Enums\StatusEnum;
use App\Models\ExecutorProject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SuperadminController extends Controller
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
    )
    {
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

        $dinasCount = $this->dinas->count(null);
        $serviceProviderCount = $this->serviceProvider->count(null);
        $executorProjectCount = $this->executorProject->count(null);
        $accidentCount = $this->accident->count(null);
        $activeExecutorProjects = $this->executorProject->customPaginate($request,15);

        return view('pages.dasboard',compact(
            'dinasCount',
            'serviceProviderCount',
            'executorProjectCount',
            'accidentCount',
            'activeExecutorProjects',
        ));
    }
}
