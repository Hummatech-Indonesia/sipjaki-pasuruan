<?php

namespace App\Services\Auth;

use App\Contracts\Interfaces\HistoryLoginInterface;
use App\Enums\RoleEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;


class LoginService
{
    private HistoryLoginInterface $historyLogin;

    public function __construct(HistoryLoginInterface $historyLoginInterface)
    {
        $this->historyLogin = $historyLoginInterface;
    }

    /**
     * handleLogin
     *
     * @param  mixed $request
     * @return void
     */
    public function handleLogin(LoginRequest $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->email_verified_at) {
                if(count(auth()->user()->roles) == 0){
                    if(auth()->user()->serviceProvider){
                        auth()->user()->assignRole(RoleEnum::SERVICE_PRODIVER->value);
                    }else{
                        auth()->user()->assignRole(RoleEnum::DINAS->value);
                    }
                }
                $this->historyLogin->store(['ip_address' => $request->ip()]);
                if ($request->is('api/*')) {
                    $data['token'] =  auth()->user()->createToken('auth_token')->plainTextToken;
                    $data['user'] = UserResource::make(auth()->user());
                    return ResponseHelper::success($data, trans('alert.login_success'));
                } else {
                    if(auth()->user()->roles->pluck('name')[0] == 'superadmin'){
                        return to_route('dashboard-superadmin');
                    }else if(auth()->user()->roles->pluck('name')[0] == 'admin'){
                        return to_route('dashboard-admin');
                    }else if(auth()->user()->roles->pluck('name')[0] == 'dinas'){
                        return to_route('dashboard-dinas');
                    }else if(auth()->user()->roles->pluck('name')[0] == 'service provider'){
                        return to_route('dashboard-service-provider');
                    }
                }
            } else {
                if ($request->is('api/*')) {
                    return ResponseHelper::error(null, trans('alert.account_unverified'), Response::HTTP_FORBIDDEN);
                } else {
                    return redirect()->back()->withErrors(trans('alert.account_unverified'));
                }
            }
        } else {
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('auth.login_failed'), Response::HTTP_FORBIDDEN);
            } else {
                return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
            }
        }
    }
}
