<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HistoryLoginInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\HistoryLoginResource;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryLoginController extends Controller
{
    private HistoryLoginInterface $historyLogin;
    public function __construct(HistoryLoginInterface $historyLoginInterface)
    {
        $this->historyLogin = $historyLoginInterface;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse|View
    {
        $histories = $this->historyLogin->get();
        if ($request->is('api/*')) {
            return ResponseHelper::success(HistoryLoginResource::collection($histories));
        } else {
            return view('pages.history-login',compact('histories'));
        }
    }
}
