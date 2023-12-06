<?php

namespace App\Services\Auth;

use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;


class LoginService
{

    /**
     * handleLogin
     *
     * @param  mixed $request
     * @return void
     */
    public function handleLogin(LoginRequest $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($request->is('api/*')) {
                if (!auth()->user()->email_verified_at) {
                    return ResponseHelper::error(null, trans('alert.account_unverified'), Response::HTTP_FORBIDDEN);
                }
                $data['token'] =  auth()->user()->createToken('auth_token')->plainTextToken;
                $data['user'] = UserResource::make(auth()->user());
                return ResponseHelper::success($data, trans('alert.login_success'));
            } else {
                if (!auth()->user()->email_verified_at) {
                    return redirect()->back()->withErrors(trans('alert.account_unverified'));
                }
                return to_route('/home');
            }
        }

        if ($request->is('api/*')) {
            return ResponseHelper::error(null, trans('alert.password_or_email_false'), Response::HTTP_BAD_REQUEST);
        } else {
            return redirect()->back()->withErrors(trans('alert.password_or_email_false'));
        }
    }
}
