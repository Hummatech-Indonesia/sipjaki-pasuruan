<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\WorkerInterface;
use App\Http\Requests\ServiceProviderRequest;
use App\Contracts\Interfaces\OfficerInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\ServiceProviderQualificationInterface;
use App\Enums\StatusEnum;
use App\Http\Requests\UpdatePasswordServiceProviderRequest;
use App\Models\ServiceProvider;
use App\Enums\TypeOfBusinessEntityEnum;
use App\Services\ServiceProviderService;

class ServiceProviderController extends Controller
{
    private UserInterface $user;
    private WorkerInterface $worker;
    private ExecutorProjectInterface $executorProject;
    private ConsultantProjectInterface $consultantProject;
    private ServiceProviderInterface $serviceProvider;
    private ServiceProviderQualificationInterface $serviceProviderQualification;
    private OfficerInterface $officer;
    private UserInterface $userI;
    private ServiceProviderService $service;

    public function __construct(
        UserInterface $user,
        ServiceProviderInterface $serviceProvider,
        ExecutorProjectInterface $executorProject,
        ConsultantProjectInterface $consultantProject,
        WorkerInterface $workerInterface,
        ServiceProviderQualificationInterface $serviceProviderQualification,
        OfficerInterface $officerInterface,
        UserInterface $userInterface,
        ServiceProviderService $service)
    {
        $this->userI = $userInterface;
        $this->worker = $workerInterface;
        $this->executorProject = $executorProject;
        $this->consultantProject = $consultantProject;
        $this->user = $user;
        $this->serviceProvider = $serviceProvider;
        $this->serviceProviderQualification = $serviceProviderQualification;
        $this->officer = $officerInterface;
        $this->service = $service;
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
        $request->merge([
            'status' => StatusEnum::ACTIVE->value
        ]);
        $activeExecutorProjects = $this->executorProject->search($request);
        $countOfficer = $this->officer->count(null);
        $countWorker = $this->worker->countWorker();
        $consultantProjects = $this->consultantProject->search($request);

        if(auth()->user()->serviceProvider->type_of_business_entity == 'consultant'){
            $activeProjectCount = $this->consultantProject->count(['status' => StatusEnum::ACTIVE->value]);
            $projectCount = $this->consultantProject->count(null);
        }else{
            $activeProjectCount = $this->executorProject->count(['status' => StatusEnum::ACTIVE->value]);
            $projectCount = $this->executorProject->count(null);
        }

        return view('pages.service-provider.dashboard',compact(
            'workers',
            'activeExecutorProjects',
            'countOfficer',
            'countWorker',
            'activeProjectCount',
            'projectCount',
            'consultantProjects'
        ));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update(ServiceProviderRequest $request)
    {
        $service = $this->service->update($request);
        $this->user->update(auth()->user()->id, $service);
        $this->serviceProvider->update(auth()->user()->serviceProvider->id, $service);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * show
     *
     * @param  mixed $service_provider
     * @return View
     */
    public function show(ServiceProvider $service_provider,Request $request): View
    {
        $serviceProviders = $this->serviceProvider->show($service_provider->id);
        $serviceProviderQualifications = $this->serviceProviderQualification->customPaginate($request, 10);
        $officers = $this->officer->get();
        $workers = $this->worker->get();
        $verifications = $service_provider->verification;
        $amendmentDeeps = $service_provider->amendmentDeed;
        $foundingDeeps = $service_provider->foundingDeed;
        return view('pages.service-provider.detail', [
            'serviceProviders' => $serviceProviders,
            'serviceProviderQualifications'=>$serviceProviderQualifications,
            'officers'=>$officers,
            'workers'=>$workers,
            'verifications'=>$verifications,
            'amendmentDeeps'=>$amendmentDeeps,
            'foundingDeeps'=>$foundingDeeps]);
    }

    /**
     * Index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request): View
    {
        $serviceProvider = $this->serviceProvider->show(auth()->user()->serviceProvider->id);
        $serviceProviderQualifications = $this->serviceProviderQualification->customPaginate($request, 10);
        $officers = $this->officer->get();
        $workers = $this->worker->get();
        $executorProjects = $this->executorProject->search($request);
        $consultantProjects = $this->consultantProject->search($request);
        $verifications = auth()->user()->serviceProvider->verification;
        $amendmentDeeps = auth()->user()->serviceProvider->amendmentDeed;
        $foundingDeeps = auth()->user()->serviceProvider->foundingDeed;


        return view('pages.service-provider.profile', compact(
            'serviceProvider',
            'serviceProviderQualifications',
            'officers',
            'workers',
            'executorProjects',
            'consultantProjects',
            'verifications',
            'amendmentDeeps',
            'foundingDeeps'
        ));
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

    /**
     * consultant
     *
     * @param  mixed $request
     * @return View
     */
    public function consultant(Request $request): View
    {
        $request->merge(['type_of_business_entity' => TypeOfBusinessEntityEnum::CONSULTANT->value]);
        $serviceProviders = $this->serviceProvider->customPaginate($request,15);
        return view('pages.dinas.konsultan', ['serviceProviders' => $serviceProviders]);
    }

    /**
     * consultant
     *
     * @param  mixed $request
     * @return View
     */
    public function executor(Request $request): View
    {
        $request->merge(['type_of_business_entity' => TypeOfBusinessEntityEnum::EXECUTOR->value]);
        $serviceProviders = $this->serviceProvider->customPaginate($request,15);
        return view('pages.dinas.penyelenggara', ['serviceProviders' => $serviceProviders]);
    }
}
