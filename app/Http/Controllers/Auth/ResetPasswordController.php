<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\ForgotPasswordInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;

class ResetPasswordController extends Controller
{
    private UserInterface $user;
    private ForgotPasswordInterface $forgotPassword;

    public function __construct(UserInterface $user, ForgotPasswordInterface $forgotPassword)
    {
        $this->user = $user;
        $this->forgotPassword = $forgotPassword;
    }

    /**
     * reset
     *
     * @param  mixed $user
     * @return void
     */
    public function index($id)
    {
        $Id = $id ;
        return view('auth.passwords.reset' ,compact('Id'));
    }
    /**
     * reset
     *
     * @param  mixed $user
     * @param  mixed $request
     * @return void
     */
    public function reset(User $user, ResetPasswordRequest $request)
    {
        $token = $this->forgotPassword->getWhere(['email' => $user->email]);
        $data = $request->validated();
        if ($token->token == $data['token'] && $token->expired_token >= now()->format('Y-m-d H:i:s')) {
            $this->user->update($user->id, $data);
            if ($request->is('api/*')) {
                return ResponseHelper::success(null, trans('auth.reset_password_success'));
            }else{
                return redirect()->back()->with('success', trans('auth.reset_password_success'));
            }
        } elseif ($token->token == $data['token'] && $token->expired_token <= now()->format('Y-m-d H:i:s')) {
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('alert.token_expired'));
            }else{
                return redirect()->back()->withErrors(trans('alert.token_expired'));
            }
        } elseif ($token->token != $data['token']) {
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('alert.token_invalid'));
            }else{
                return redirect()->back()->withErrors(trans('alert.token_invalid'));
            }
        } else {
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('auth.reset_password_failed'));
            }else{
                return redirect()->back()->withErrors(trans('auth.reset_password_failed'));
            }
        }
    }
}
