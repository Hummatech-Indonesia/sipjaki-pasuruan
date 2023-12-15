<?php

namespace App\Services\Auth;

use App\Contracts\Interfaces\HistoryLoginInterface;
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
                $this->historyLogin->store(['ip_address' => $request->ip()]);
                // if ($request->is('api/*')) {
                $data['token'] =  auth()->user()->createToken('auth_token')->plainTextToken;
                $data['user'] = UserResource::make(auth()->user());
                return ResponseHelper::success($data, trans('alert.login_success'));
                // } else {
                //     return to_route('home');
                // }
            } else {
                // if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('alert.account_unverified'), Response::HTTP_FORBIDDEN);
                // } else {
                //     return redirect()->back()->withErrors(trans('alert.account_unverified'));
                // }
            }
        } else {
            // if ($request->is('api/*')) {
            return ResponseHelper::error(null, trans('auth.login_failed'), Response::HTTP_FORBIDDEN);
            // } else {
            //     return redirect()->back()->withErrors(trans('auth.login_failed'));
            // }
        }
    }
}
