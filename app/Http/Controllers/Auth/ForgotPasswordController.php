<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\ForgotPasswordInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Repositories\ForgotPasswordRepository;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    private ForgotPasswordInterface $forgotPassword;
    private UserInterface $user;
    public function __construct(ForgotPasswordInterface $forgotPassword, UserInterface $user)
    {
        $this->forgotPassword = $forgotPassword;
        $this->user = $user;
    }

    /**
     * sendEmail
     *
     * @param  mixed $request
     * @return void
     */
    public function sendEmail(ForgotPasswordRequest $request)
    {
        $data = $request->validated();
        $data['token'] = strtoupper(Str::random(5));
        $data['expired_token'] = now()->addMinutes(40);
        $forgotPassword = $this->forgotPassword->store($data);
        $user = $this->user->getWhere(['email' => $forgotPassword['email']]);
        Mail::to($data['email'])->send(new ForgotPasswordMail(['email' => $data['email'], 'token' => $data['token'], 'id' => $user->id]));

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('auth.send_email_forgot_password'));
        } else {
            return redirect()->back()->with('success', trans('auth.send_email_forgot_password'));
        }
    }
}
