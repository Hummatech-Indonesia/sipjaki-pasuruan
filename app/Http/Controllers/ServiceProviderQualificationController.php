<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ServiceProviderQualificationInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ServiceProviderQualificationRequest;
use App\Http\Resources\ServiceProviderQualificationResource;
use App\Models\ServiceProviderQualification;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class ServiceProviderQualificationController extends Controller
{
    use PaginationTrait;
    private ServiceProviderQualificationInterface $serviceProviderQualification;

    public function __construct(ServiceProviderQualificationInterface $serviceProviderQualification)
    {
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
            return view('pages.approval.qualification', ['serviceProviderQualifications' => $serviceProviderQualifications]);
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
        $this->serviceProviderQualification->store($request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
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
        $request->validated();
        $data['status'] = 0;
        $this->serviceProviderQualification->update($serviceProviderQualification->id, $data);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
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
        $data['status'] = 1;
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
}
