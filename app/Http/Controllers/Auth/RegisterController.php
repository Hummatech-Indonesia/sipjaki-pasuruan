<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Services\Auth\RegisterService;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Contracts\Interfaces\AssociationInterface;
use App\Contracts\Interfaces\Auth\RegisterInterface;

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
    private UserInterface $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $service, RegisterInterface $register, AssociationInterface $association,UserInterface $user)
    {
        $this->service = $service;
        $this->register = $register;
        $this->association = $association;
        $this->user = $user;
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

        return view('auth.register', compact('title', 'associations'));
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
         $params = $this->service->handleRegistration($request, $this->register);
         if ($request->is('api/*')) {
             return ResponseHelper::success(null, trans('auth.register_success'));
         } else {
             return redirect()->to('verify-account/' . $params)->with('success', trans('auth.register_success'));
         }
     }

    public function approval(Request $request)
    {
        $request->merge([
            'unverified' => true
        ]);
        $users = $this->user->customPaginate($request,10);
        return view('auth.approval',compact('users'));
    }

    public function approve(User $user)
    {
        $this->user->update($user,['email_registered_at'=> now()]);
        return redirect()->back()->with('success','Berhasil Memverikasi Email');
    }
}
