<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Helpers\UserHelper;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use App\Traits\PaginationTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use PaginationTrait;

    private UserInterface $user;
    private UserService $service;
    private DinasInterface $dinas;
    public function __construct(UserInterface $user, UserService $service, DinasInterface $dinas)
    {
        $this->user = $user;
        $this->service = $service;
        $this->dinas = $dinas;
    }

    /**
     * Display a listing of the resource.
     * @param  mixed $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse | View
    {
        $users = $this->user->customPaginate($request, 10);
        $users->appends(['name' => $request->name]);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($users->currentPage(), $users->lastPage());
            $data['data'] = UserResource::collection($users);
            return ResponseHelper::success($data);
        } else {
            $name = $request->name;

            return view('pages.agency', ['users' => $users,'name'=>$name]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param  mixed $request
     * @return void
     */
    public function store(UserRequest $request)
    {   
        $this->service->store($request, $this->user);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }
    /**
     * Update the specified resource in storage.
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->user->update($user->id, $this->service->update($request,$user));
        $this->dinas->update($user->dinas->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  mixed $user
     * @return void
     */
    public function destroy(User $user, Request $request)
    {
        $this->user->delete($user->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * updateProfile
     *
     * @return void
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->user->update(UserHelper::getUserId(), $this->service->updateProfile($request));

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.profile_updated'));
        } else {
            return redirect()->back()->with('success', trans('alert.profile_updated'));
        }
    }

    /**
     * updatePassword
     *
     * @param  mixed $request
     * @return void
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $this->user->update(UserHelper::getUserId(), $data);
        return redirect()->back()->with('success', trans('alert.update_success'));
    }
}
