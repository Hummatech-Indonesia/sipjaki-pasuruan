<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Mail\RegistrationMail;
use App\Helpers\ResponseHelper;
use App\Mail\EmailVerifiedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\VerifyTokenRequest;
use App\Contracts\Interfaces\UserInterface;
use Illuminate\Foundation\Auth\VerifiesEmails;

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
     * verifyacount
     *
     * @param  mixed $id
     * @return void
     */
    public function verifyacount(User $user,string $token)
    {
        if($user->token != $token) abort(404);
        if($user->expired_token < now()) return view('auth.email-verified',['Id' => $user->id,'isVerified' => false]);
        $this->user->update($user->id,['email_verified_at' => now()]);
        Mail::to($user->email)->send(new EmailVerifiedMail(['email' => $user->email, 'name' => $user->name]));
        return view('auth.verify-account',['Id' => $user->id,'isVerified' => true])->with('success', trans('alert.verify_success'));
    }

    /**
     * sendResend
     *
     * @param  mixed $user
     * @return void
     */
    public function sendResend(User $user)
    {
        if (Cache::has('verification_sent_' . $user->id)) {
            return redirect()->back()->withErrors(['errors' => 'Anda telah mengirim ulang token verifikasi dalam beberapa waktu terakhir, Silahkan tunggu hingga 2 menit lagi']);
        }

        $token = strtoupper(Str::random(5));
        Mail::to($user->email)->send(new RegistrationMail(['email' => $user->email, 'user' => $user->name, 'token' => $token, 'id' => $user->id]));

        Cache::put('verification_sent_' . $user->id, true, now()->addMinutes(2));

        return redirect()->back()->with('success', 'Berhasil mengirim ulang token verifikasi');
    }
}
