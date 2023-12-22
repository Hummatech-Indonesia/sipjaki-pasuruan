<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ServiceProviderQualificationInterface;
use App\Enums\ServiceProviderQualificationEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\RejectSericeProviderQualificationRequest;
use App\Http\Requests\ServiceProviderQualificationRequest;
use App\Http\Resources\ServiceProviderQualificationResource;
use App\Models\ServiceProviderQualification;
use App\Services\ServiceProviderQualificationService;
use App\Traits\PaginationTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceProviderQualificationController extends Controller
{
    use PaginationTrait;
    private ServiceProviderQualificationInterface $serviceProviderQualification;
    private ServiceProviderQualificationService $service;

    public function __construct(ServiceProviderQualificationInterface $serviceProviderQualification, ServiceProviderQualificationService $serviceProviderQualificationService)
    {
        $this->service = $serviceProviderQualificationService;
        $this->serviceProviderQualification = $serviceProviderQualification;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $serviceProviderQualifications = $this->serviceProviderQualification->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($serviceProviderQualifications->currentPage(), $serviceProviderQualifications->lastPage());
            $data['data'] = ServiceProviderQualificationResource::collection($serviceProviderQualifications);
            return ResponseHelper::success($data);
        } else {
            return view('', ['serviceProviderQualifications' => $serviceProviderQualifications]);
        }
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ServiceProviderQualificationRequest $request)
    {
        $data = $this->service->store($request);
        $this->serviceProviderQualification->store($data);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * show
     *
     * @param  mixed $service_provider_qualification
     * @return View
     */
    public function show(ServiceProviderQualification $service_provider_qualification): View
    {
        return view('pages.detail-file-sercive', ['serviceProviderQualification' => $service_provider_qualification]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $serviceProviderQualification
     * @return void
     */
    public function update(ServiceProviderQualificationRequest $request, ServiceProviderQualification $serviceProviderQualification)
    {
        $data = $this->service->update($serviceProviderQualification, $request);
        $data['status'] = ServiceProviderQualificationEnum::PENDING->value;
        $this->serviceProviderQualification->update($serviceProviderQualification->id, $data);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * delete
     *
     * @param  mixed $request
     * @param  mixed $serviceProviderQualification
     * @return void
     */
    public function delete(Request $request, ServiceProviderQualification $serviceProviderQualification)
    {
        $this->service->remove($serviceProviderQualification->file);
        $this->serviceProviderQualification->delete($serviceProviderQualification->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * approve
     *
     * @param  mixed $serviceProviderQualification
     * @param  mixed $request
     * @return void
     */
    public function approve(ServiceProviderQualification $serviceProviderQualification, Request $request)
    {
        $data['status'] = ServiceProviderQualificationEnum::ACTIVE->value;
        if ($serviceProviderQualification->first_print == null) {
            $data['first_print'] = now();
        }
        $data['last_print'] = now();
        $this->serviceProviderQualification->update($serviceProviderQualification->id, $data);

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, 'Berhasil Menyetujui Permohonan');
        } else {
            return redirect()->back()->with('success', 'Berhasil Menyetujui Permohonan');
        }
    }

    /**
     * reject
     *
     * @return void
     */
    public function reject(RejectSericeProviderQualificationRequest $request, ServiceProviderQualification $serviceProviderQualification)
    {
        $data = $request->validated();
        $data['status'] = ServiceProviderQualificationEnum::REJECT->value;
        $this->serviceProviderQualification->update($serviceProviderQualification->id, $data);
        return redirect()->back()->with('success', 'Berhasil Menolak Permohonan');
    }

    /**
     * active
     *
     * @return View
     */
    public function active(): View|JsonResponse
    {
        $serviceProviderQualificationActive = $this->serviceProviderQualification->getActive();
        return view('', ['serviceProviderQualificationActive' => $serviceProviderQualificationActive]);
    }

    /**
     * pending
     *
     * @return View
     */
    public function pending(): View|JsonResponse
    {
        $serviceProviderQualificationPending = $this->serviceProviderQualification->getPending();
        return view('pages.approval.qualification', ['serviceProviderQualificationPending' => $serviceProviderQualificationPending]);
    }

    /**
     * getReject
     *
     * @return View
     */
    public function getReject(): View|JsonResponse
    {
        $serviceProviderQualificationReject = $this->serviceProviderQualification->getReject();
        return view('', ['serviceProviderQualificationReject' => $serviceProviderQualificationReject]);
    }

    /**
     * detailPending
     *
     * @param  mixed $service_provider_qualification
     * @return View
     */
    public function detailPending(ServiceProviderQualification $service_provider_qualification) : View
    {
        return view('', ['service_provider_qualification' => $service_provider_qualification]);
    }
}
