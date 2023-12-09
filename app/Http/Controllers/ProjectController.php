<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ContractCategoryInterface;
use App\Contracts\Interfaces\FundSourceInterface;
use App\Models\Project;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\ProjectResource;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;

class ProjectController extends Controller
{

    private ProjectInterface $project;
    private ServiceProviderInterface $serviceProvider;
    private FundSourceInterface $fundSource;
    private ContractCategoryInterface $contractCategory;

    public function __construct(ProjectInterface $project,ServiceProviderInterface $serviceProvider,FundSourceInterface $fundSource,ContractCategoryInterface $contractCategory)
    {
        $this->project = $project;
        $this->serviceProvider = $serviceProvider;
        $this->fundSource = $fundSource;
        $this->contractCategory = $contractCategory;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View | JsonResponse
    {

        $projects = $this->project->customPaginate($request, 15);

        if( $request->is('api/*')){

            $data['paginate'] = $this->customPaginate($projects->currentPage(), $projects->lastPage());
            $data['data'] = ProjectResource::collection($projects);
            return ResponseHelper::success($data,trans('alert.get_success'));

        }else{

            $serviceProviders = $this->serviceProvider->get();
            $fundSources = $this->fundSource->get();
            $contractCategories = $this->contractCategory->get();
            return view('pages.dinas.work-package',compact('projects','serviceProviders','fundSources','contractCategories'));

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request): RedirectResponse | JsonResponse
    {
        $this->project->store($request->validated());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.add_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.add_success'));

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project) : JsonResponse
    {
        return ResponseHelper::success(ProjectResource::make($project),trans('alert.get_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request,Project $project) : RedirectResponse | JsonResponse
    {
        $this->project->update($project->id,$request->all());

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.update_success'));

        }else{

           return redirect()->back()->with('success',trans('alert.update_success'));

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Request $request)
    {
        $this->project->delete($project->id);

        if( $request->is('api/*')){

            return ResponseHelper::success(null,trans('alert.delete_success'));

        }else{

            return redirect()->back()->with('success',trans('alert.delete_success'));

        }
    }

    /**
     * listProjects
     *
     * @return JsonResponse
     */
    public function listProjects(): JsonResponse
    {
        return ResponseHelper::success(ProjectResource::collection($this->project->get()));
    }
}
