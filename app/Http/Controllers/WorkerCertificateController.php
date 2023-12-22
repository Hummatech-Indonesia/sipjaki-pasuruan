<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\WorkerCertificateInterface;
use App\Http\Requests\WorkerCertificateRequest;
use App\Models\Worker;
use App\Models\WorkerCertificate;
use App\Services\WorkerCertificateService;

class WorkerCertificateController extends Controller
{
    private WorkerCertificateInterface $workerCertificate;
    private WorkerCertificateService $service;
    public function __construct(WorkerCertificateInterface $workerCertificateInterface, WorkerCertificateService $workerCertificateService)
    {
        $this->service = $workerCertificateService;
        $this->workerCertificate = $workerCertificateInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Worker $worker)
    {
        $workerCertificates = $this->workerCertificate->show($worker->id);
        return view('pages.service-provider.workforce-certificate', ['workerCertificates' => $workerCertificates, 'worker' => $worker]);
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
    public function store(WorkerCertificateRequest $request, Worker $worker)
    {
        $data = $this->service->store($request);
        $data['worker_id'] = $worker->id;
        $this->workerCertificate->store($data);
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkerCertificate $worker_certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkerCertificate $worker_certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkerCertificateRequest $request, WorkerCertificate $worker_certificate)
    {
        $this->workerCertificate->update($worker_certificate->id, $this->service->update($worker_certificate, $request));
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkerCertificate $worker_certificate)
    {
        $this->service->remove($worker_certificate->file);
        $this->workerCertificate->delete($worker_certificate->id);
        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
