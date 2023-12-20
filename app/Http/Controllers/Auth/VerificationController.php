<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyTokenRequest;
use App\Mail\RegistrationMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\UserService;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private UserInterface $user;
    private UserService $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserInterface $user, UserService $service)
    {
        $this->user = $user;
        $this->service = $service;
    }

    public function verifyAccount(User $user)
    {
        return redirect()->route('verify.account');
    }

    /**
     * updateToken
     *
     * @param  mixed $user
     * @return void
     */
    public function updateToken(User $user, Request $request)
    {
        $token = strtoupper(Str::random(5));
        $this->user->update($user->id, [
            'token' => $token,
            'expired_token' => now()->addMinutes('40')
        ]);
        Mail::to($user->email)->send(new RegistrationMail(['email' => $user->email, 'user' => $user->name, 'token' => $token, 'id' => $user->id]));

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_token'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_token'));
        }
    }

    /**
     * verifyToken
     *
     * @param  mixed $user
     * @return void
     */
    public function verifyToken(User $user, VerifyTokenRequest $request)
    {
        if ($request->token != $user->token) {
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('alert.token_invalid'));
            } else {
                return redirect()->back()->withErrors(trans('alert.token_invalid'));
            }
        } elseif ($request->token == $user->token && $user->expired_token >= now()->format('Y-m-d H:i:s')) {
            $this->user->update($user->id, ['email_verified_at' => now()]);
            if ($request->is('api/*')) {
                return ResponseHelper::success(null, trans('alert.verify_success'));
            } else {
                return redirect()->back()->with('success', trans('alert.verify_success'));
            }
        } elseif ($request->token == $user->token && $user->expired_token <= now()->format('Y-m-d H:i:s')) {
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('alert.token_expired'));
            } else {
                return redirect()->back()->withErrors(trans('alert.token_expired'));
            }
        } else {
            if ($request->is('api/*')) {
                return ResponseHelper::error(null, trans('alert.verify_error'));
            } else {
                return redirect()->back()->withErrors(trans('alert.verify_error'));
            }
        }
    }

    /**
     * verifyacount
     *
     * @param  mixed $id
     * @return void
     */
    public function verifyacount($id)
    {
        $Id = $id;
        return view('auth.verify-account', compact('Id'));
    }

    /**
     * sendResend
     *
     * @param  mixed $user
     * @return void
     */
    public function sendResend(User $user)
    {
        $token = strtoupper(Str::random(5));
        Mail::to($user->email)->send(new RegistrationMail(['email' => $user->email, 'user' => $user->name, 'token' => $token, 'id' => $user->id]));
        return redirect()->back()->with('success', 'Berhasil mengirim ulang token verifikasi');
    }
}
