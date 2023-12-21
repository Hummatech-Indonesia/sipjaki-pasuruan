<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HistoryLoginInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\HistoryLoginResource;
use App\Models\HistoryLogin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

        $histories = $this->historyLogin->customPaginate($request, 15);
        $histories->appends(['name' => $request->name, 'start_date' => $request->start_date, 'end_date' => $request->end_date]);
        if ($request->is('api/*')) {
            return ResponseHelper::success(HistoryLoginResource::collection($histories));
        } else {
            $name = $request->name;
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            return view('pages.history-login',compact('histories','name','startDate','endDate'));
        }
    }

    /**
     * clear
     *
     * @return RedirectResponse
     */
    public function clear(): RedirectResponse
    {
        $this->historyLogin->clear();

        return redirect()->back()->with('success',trans('alert.delete_success'));
    }

        /**
     * destroy
     *
     * @param  mixed $historyLogin
     * @return void
     */
    public function destroy(HistoryLogin $historyLogin) : RedirectResponse
    {
        $this->historyLogin->delete($historyLogin->id);

        return redirect()->back()->with('success',trans('alert.delete_success'));
    }
}
