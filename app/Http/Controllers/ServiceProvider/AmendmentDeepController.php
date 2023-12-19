<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Contracts\Interfaces\AmendmentDeepInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AmendmentDeepRequest;
use App\Http\Resources\AmendmentDeepResource;
use Illuminate\Http\Request;

class AmendmentDeepController extends Controller
{
    private AmendmentDeepInterface $amendmentDeep;
    public function __construct(AmendmentDeepInterface $amendmentDeep)
    {
        $this->amendmentDeep = $amendmentDeep;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $verifications = $this->amendmentDeep->customPaginate($request, 10);
        // if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($verifications->currentPage(), $verifications->lastPage());
        $data['data'] = AmendmentDeepResource::collection($verifications);
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
    public function store(AmendmentDeepRequest $request)
    {
        $data = $request->validated();
        $data['service_provider_id'] = auth()->user()->serviceProvider->id;
        $this->amendmentDeep->store($data);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }
}
