<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ServiceProviderRequest;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    private UserInterface $user;
    private ServiceProviderInterface $serviceProvider;
    public function __construct(UserInterface $user, ServiceProviderInterface $serviceProvider)
    {
        $this->user = $user;
        $this->serviceProvider = $serviceProvider;
    }

    /**
     * update
     *
     * @param  mixed $request
     * @return void
     */
    public function update(ServiceProviderRequest $request)
    {
        $this->user->update(auth()->user()->id, $request->validated());
        $this->serviceProvider->update(auth()->user()->serviceProvider->id, $request->validated());
        return ResponseHelper::success(null, trans('alert.update_success'));
    }
}
