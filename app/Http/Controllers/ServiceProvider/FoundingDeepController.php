<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Contracts\Interfaces\FoundingDeepInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\FoundingDeepRequest;
use App\Http\Resources\FoundingDeepResource;
use Illuminate\Http\Request;

class FoundingDeepController extends Controller
{
    private FoundingDeepInterface $foundingDeep;
    public function __construct(FoundingDeepInterface $foundingDeep)
    {
        $this->foundingDeep = $foundingDeep;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $verifications = $this->foundingDeep->customPaginate($request, 10);
        // if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($verifications->currentPage(), $verifications->lastPage());
        $data['data'] = FoundingDeepResource::collection($verifications);
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
    public function store(FoundingDeepRequest $request)
    {
        $data = $request->validated();
        $data['service_provider_id'] = auth()->user()->serviceProvider->id;
        $this->foundingDeep->store($data);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }
}
