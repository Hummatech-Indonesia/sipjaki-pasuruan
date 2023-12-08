<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
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
     */
    public function index(Request $request): JsonResponse | View
    {
        $users = $this->user->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($users->currentPage(), $users->lastPage());
            $data['data'] = UserResource::collection($users);
            return ResponseHelper::success($data);
        } else {
            return view('pages.agency', ['users' => $users]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
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
     */
    public function update(UserRequest $request, User $user)
    {
        $this->user->update($user->id, $request->validated());
        $this->dinas->update($user->dinas->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->user->delete($user->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
