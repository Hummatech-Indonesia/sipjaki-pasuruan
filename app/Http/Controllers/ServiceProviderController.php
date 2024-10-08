<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AssociationInterface;
use App\Models\User;
use App\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Enums\TypeOfBusinessEntityEnum;
use App\Services\ServiceProviderService;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\WorkerInterface;
use App\Http\Requests\ServiceProviderRequest;
use App\Contracts\Interfaces\OfficerInterface;
use App\Http\Requests\DeleteServiceProviderRequest;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Http\Requests\UpdatePasswordServiceProviderRequest;
use App\Contracts\Interfaces\ServiceProviderQualificationInterface;

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
    private AssociationInterface $association;

    public function __construct(
        UserInterface $user,
        ServiceProviderInterface $serviceProvider,
        ExecutorProjectInterface $executorProject,
        ConsultantProjectInterface $consultantProject,
        WorkerInterface $workerInterface,
        ServiceProviderQualificationInterface $serviceProviderQualification,
        OfficerInterface $officerInterface,
        UserInterface $userInterface,
        ServiceProviderService $service,
        AssociationInterface $association
    ) {
        $this->userI = $userInterface;
        $this->worker = $workerInterface;
        $this->executorProject = $executorProject;
        $this->consultantProject = $consultantProject;
        $this->user = $user;
        $this->serviceProvider = $serviceProvider;
        $this->serviceProviderQualification = $serviceProviderQualification;
        $this->officer = $officerInterface;
        $this->service = $service;
        $this->association = $association;
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

        if (auth()->user()->serviceProvider->type_of_business_entity == 'consultant') {
            $activeProjectCount = $this->consultantProject->count(['status' => StatusEnum::ACTIVE->value]);
            $projectCount = $this->consultantProject->count(null);
        } else {
            $activeProjectCount = $this->executorProject->count(['status' => StatusEnum::ACTIVE->value]);
            $projectCount = $this->executorProject->count(null);
        }

        return view('pages.service-provider.dashboard', compact(
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
    public function update(ServiceProviderRequest $request,User $user)
    {
        $service = $this->service->update($request,$user->serviceProvider->file);
        $this->user->update($user->id, $service);
        $this->serviceProvider->update($user->serviceProvider->id, $service);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }
    
    /**
     * destroy
     *
     * @param  mixed $serviceProvider
     * @return RedirectResponse
     */
    public function destroy(ServiceProvider $serviceProvider) : RedirectResponse
    {
        $user = $this->serviceProvider->show($serviceProvider->id);
        User::findOrFail($user->user_id)->delete();
        return redirect()->back()->with('success',trans('alert.delete_success'));
    }

    /**
     * destroy
     *
     * @param  mixed $serviceProvider
     * @return RedirectResponse
     */
    public function destroys(DeleteServiceProviderRequest $request) : RedirectResponse
    {
        foreach(explode(',',$request->id) as $id){
            $user = $this->serviceProvider->show($id);
            User::findOrFail($user->user_id)->delete();
        }
        return redirect()->back()->with('success',trans('alert.delete_success'));
    }

    /**
     * show
     *
     * @param  mixed $service_provider
     * @return View
     */
    public function show(ServiceProvider $service_provider, Request $request): View
    {
        $serviceProviders = $this->serviceProvider->show($service_provider->id);
        $serviceProviderQualifications = $service_provider->serviceProviderQualifications;
        $officers = $service_provider->officers;
        $workers = $service_provider->workers;
        $verifications = $service_provider->verification;
        $amendmentDeeps = $service_provider->amendmentDeed;
        $foundingDeeps = $service_provider->foundingDeed;
        return view('pages.service-provider.detail', [
            'serviceProviders' => $serviceProviders,
            'serviceProviderQualifications' => $serviceProviderQualifications,
            'officers' => $officers,
            'workers' => $workers,
            'verifications' => $verifications,
            'amendmentDeeps' => $amendmentDeeps,
            'foundingDeeps' => $foundingDeeps
        ]);
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
        $serviceProviderQualifications = $this->serviceProviderQualification->search($request);
        $officers = $this->officer->search($request);
        $workers = $this->worker->search($request);
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
        $serviceProviders = $this->serviceProvider->customPaginate($request, 10);
        $associations = $this->association->get();

        return view('pages.dinas.konsultan', ['serviceProviders' => $serviceProviders,'associations' => $associations]);
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
        $serviceProviders = $this->serviceProvider->customPaginate($request, 10);
        $associations = $this->association->get();
        return view('pages.dinas.penyelenggara',['serviceProviders' => $serviceProviders,'associations' => $associations]);
    }
}
