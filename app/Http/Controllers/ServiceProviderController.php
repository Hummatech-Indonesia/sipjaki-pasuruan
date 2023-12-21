<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AmendmentDeepInterface;
use App\Contracts\Interfaces\FoundingDeepInterface;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Contracts\View\View;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\WorkerInterface;
use App\Http\Requests\ServiceProviderRequest;
use App\Contracts\Interfaces\OfficerInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\ServiceProviderQualificationInterface;
use App\Contracts\Interfaces\VerificationInterface;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdatePasswordServiceProviderRequest;
use App\Models\ServiceProvider;

class ServiceProviderController extends Controller
{
    private UserInterface $user;
    private WorkerInterface $worker;
    private ProjectInterface $project;
    private ServiceProviderInterface $serviceProvider;
    private ServiceProviderQualificationInterface $serviceProviderQualification;
    private OfficerInterface $officer;
    private VerificationInterface $verification;
    private FoundingDeepInterface $foundingDeep;
    private AmendmentDeepInterface $amendmentDeep;
    private UserInterface $userI;

    public function __construct(UserInterface $user, ServiceProviderInterface $serviceProvider, ProjectInterface $projectInterface, WorkerInterface $workerInterface, ServiceProviderQualificationInterface $serviceProviderQualification, OfficerInterface $officerInterface, VerificationInterface $verification, FoundingDeepInterface $foundingDeep, AmendmentDeepInterface $amendmentDeep, UserInterface $userInterface)
    {
        $this->userI = $userInterface;
        $this->foundingDeep = $foundingDeep;
        $this->verification = $verification;
        $this->worker = $workerInterface;
        $this->project = $projectInterface;
        $this->user = $user;
        $this->serviceProvider = $serviceProvider;
        $this->serviceProviderQualification = $serviceProviderQualification;
        $this->officer = $officerInterface;
        $this->amendmentDeep = $amendmentDeep;
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
        $countOfficer = $this->officer->count(null);
        $countWorker = $this->worker->countWorker();
        $countExperience = $this->project->countProject();
        $countAllExperience = $this->project->countAllProject();
        $year = $request->year;
        return view('pages.service-provider.dashboard', ['experiences' => $experiences, 'workers' => $workers, 'countWorker' => $countWorker, 'countExperience' => $countExperience, 'countAllExperience' => $countAllExperience, 'countOfficer' => $countOfficer, 'year'=> $year]);
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
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {
        $serviceProviders = $this->serviceProvider->show(auth()->user()->serviceProvider->id);
        $serviceProviderQualifications = $this->serviceProviderQualification->customPaginate($request, 10);
        $officers = $this->officer->get();
        $workers = $this->worker->get();
        $verifications = auth()->user()->serviceProvider->verification;
        $amendmentDeeps = auth()->user()->serviceProvider->amendmentDeed;
        $foundingDeeps = auth()->user()->serviceProvider->foundingDeed;
        return view('pages.service-provider.profile', ['serviceProvider' => $serviceProviders, 'serviceProviderQualifications' => $serviceProviderQualifications, 'officers' => $officers, 'workers' => $workers, 'verifications' => $verifications, 'amendmentDeeps' => $amendmentDeeps, 'foundingDeeps' => $foundingDeeps]);
    }

    /**
     * updatePassword
     *
     * @param  mixed $service_provider
     * @param  mixed $request
     * @return void
     */
    public function updatePassword(ServiceProvider $service_provider, UpdatePasswordServiceProviderRequest $request)
    {
        $data = $request->validated();
        $this->userI->update($service_provider->user_id, ['password' => bcrypt($data['password'])]);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }
}
