<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\WorkerInterface;
use App\Exports\WorkerExport;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\WorkerRequest;
use App\Http\Resources\WorkerResource;
use App\Imports\WorkerImport;
use App\Models\ServiceProvider;
use App\Models\Worker;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Maatwebsite\Excel\Facades\Excel;

class WorkerController extends Controller
{

    private WorkerInterface $worker;
    public function __construct(WorkerInterface $workerInterface)
    {
        $this->worker = $workerInterface;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return JsonResponse|View
     */
    public function index(Request $request): JsonResponse|View
    {
        $workers = $this->worker->get();
        // if ($request->is('api/*')) {
        return ResponseHelper::success(WorkerResource::collection($workers));
        // } else {
        //     return view('', ['workers' => $workers]);
        // }
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
    /**
     * store
     *
     * @param  mixed $request
     * @return JsonResponse|RedirectResponse
     */
    public function store(ServiceProvider $service_provider, WorkerRequest $request): JsonResponse|RedirectResponse
    {
        $data = $request->validated();
        $data['service_provider_id'] = $service_provider->id;
        $this->worker->store($data);
        // if ($request->is('api/*')) {
        return ResponseHelper::success(null, trans('alert.add_success'));
        // } else {
        //     return redirect()->back()->with('success', trans('alert.delete_success'));
        // }
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
     * @param  mixed $worker
     * @return JsonResponse|RedirectResponse
     */
    public function update(WorkerRequest $request, Worker $worker): JsonResponse|RedirectResponse
    {
        $this->worker->update($worker->id, $request->validated());
        // if ($request->is('api/*')) {
        return ResponseHelper::success(null, trans('alert.update_success'));
        // } else {
        //     return redirect()->back()->with('success', trans('alert.update_success'));
        // }
    }
    /**
     * destroy
     *
     * @param  mixed $request
     * @param  mixed $worker
     * @return JsonResponse|RedirectResponse
     */
    public function destroy(Request $request, Worker $worker): JsonResponse|RedirectResponse
    {
        $this->worker->delete($worker->id);
        // if ($request->is('api/*')) {
        return ResponseHelper::success(null, trans('alert.delete_success'));
        // } else {
        //     return redirect()->back()->with('success', trans('alert.delete_success'));
        // }
    }

    /**
     * import
     *
     * @param  mixed $request
     * @return void
     */
    public function import(ImportRequest $request)
    {
        $data = $request->validated();
        Excel::import(new WorkerImport, $data['import']);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    public function export()
    {
        return Excel::download(new WorkerExport, 'tenaga-kerja-' . auth()->user()->name . '.xlsx');
    }
}
