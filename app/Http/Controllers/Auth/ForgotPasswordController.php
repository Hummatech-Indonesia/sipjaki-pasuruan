<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\ForgotPasswordInterface;
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
    public function __construct(ForgotPasswordRepository $forgotPassword)
    {
        $this->forgotPassword = $forgotPassword;
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
        $this->forgotPassword->store($data);
        Mail::to($data['email'])->send(new ForgotPasswordMail(['email' => $data['email'], 'token' => $data['token']]));


        return ResponseHelper::success(null, trans('auth.send_email_forgot_password'));
    }
}
