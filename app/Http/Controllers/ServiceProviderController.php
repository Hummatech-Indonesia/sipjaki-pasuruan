<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ServiceProviderRequest;
use App\Contracts\Interfaces\WorkerInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    private UserInterface $user;
    private WorkerInterface $worker;
    private ProjectInterface $project;
    private ServiceProviderInterface $serviceProvider;
    public function __construct(UserInterface $user, ServiceProviderInterface $serviceProvider, ProjectInterface $projectInterface)
    {
        $this->project = $projectInterface;
        $this->user = $user;
        $this->serviceProvider = $serviceProvider;
    }

    /**
     * dashboard
     *
     * @param  mixed $request
     * @return View
     */
    public function dashboard(Request $request): View
    {
        $workers = $this->worker->getByServiceProvider($request);
        $experiences = $this->project->getByServiceProvider($request);
        $countWorker = $this->worker->countWorker();
        $countExperience = $this->project->countProject();
        $countAllExperience = $this->project->countAllProject();
        return view('pages.service-provider.dashboard', ['experiences' => $experiences, 'workers' => $workers, 'countWorker' => $countWorker, 'countExperience' => $countExperience, 'countAllExperience' => $countAllExperience]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update(ServiceProviderRequest $request)
    {
        $this->user->update(auth()->user()->id, $request->validated());
        $this->serviceProvider->update(auth()->user()->serviceProvider->id, $request->validated());
        return ResponseHelper::success(null, trans('alert.update_success'));
    }
}
