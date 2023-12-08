<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\RuleInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\RuleRequest;
use App\Http\Resources\RuleResource;
use App\Models\Rules;
use App\Services\RuleService;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    use PaginationTrait;
    private RuleInterface $rule;
    private RuleService $service;
    private ServiceProviderInterface $serviceProvider;

    public function __construct(RuleInterface $rule, RuleService $service, ServiceProviderInterface $serviceProvider)
    {
        $this->rule = $rule;
        $this->service = $service;
        $this->serviceProvider = $serviceProvider;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rules = $this->rule->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($rules->currentPage(), $rules->lastPage());
            $data['data'] = RuleResource::collection($rules);
            return ResponseHelper::success($data);
        } else {
            $serviceProviders = $this->serviceProvider->get();
            return view('rules.news', ['rules' => $rules, 'serviveProviders' => $serviceProviders]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleRequest $request)
    {
        $this->rule->store($this->service->store($request));
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $rule
     * @return void
     */
    public function update(RuleRequest $request, Rules $rule)
    {
        $this->rule->update($rule->id, $this->service->update($request, $rule));
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rules $rule, Request $request)
    {
        $this->rule->delete($rule->id);
        $this->service->remove($rule->file);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
