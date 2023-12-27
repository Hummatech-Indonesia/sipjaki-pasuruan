<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\AssociationInterface;
use App\Contracts\Interfaces\Auth\RegisterInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\Auth\RegisterService;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers, VerifiesEmails;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private RegisterService $service;
    private RegisterInterface $register;
    private AssociationInterface $association;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $service, RegisterInterface $register,AssociationInterface $association)
    {
        $this->service = $service;
        $this->register = $register;
        $this->association = $association;
    }

    /**
     * Show the application registration form.
     *
     * @return View
     */
    public function showRegistrationForm(): View
    {
        $title = trans('title.register');
        $associations = $this->association->get();

        return view('auth.register', compact('title','associations'));
    }


    /**
     * Handle school registration form
     *
     * @param RegisterRequest $request
     *
     * @return RedirectResponse
     */

    public function register(RegisterRequest $request)
    {
        $this->service->handleRegistration($request, $this->register);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('auth.register_success'));
        } else {
            return redirect()->route('verification.verify')->with('success', trans('auth.register_success'));
        }
    }
}
