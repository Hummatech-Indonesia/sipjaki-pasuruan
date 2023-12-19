<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Contracts\Interfaces\VerificationInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Http\Resources\VerificationResource;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use PaginationTrait;
    private VerificationInterface $verification;
    public function __construct(VerificationInterface $verification)
    {
        $this->verification = $verification;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $verifications = $this->verification->customPaginate($request, 10);
        // if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($verifications->currentPage(), $verifications->lastPage());
        $data['data'] = VerificationResource::collection($verifications);
        return ResponseHelper::success($data);
        // } else {
        //     return view('pages.admin.news', ['verifications' => $verifications]);
        // }
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(VerificationRequest $request)
    {
        $data = $request->validated();
        $data['service_provider_id'] = auth()->user()->serviceProvider->id;
        $this->verification->store($data);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }
}
