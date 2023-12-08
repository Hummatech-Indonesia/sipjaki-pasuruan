<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TrainingMemberInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ImportRequest;
use App\Http\Requests\TrainingMemberRequest;
use App\Http\Resources\TrainingMemberResource;
use App\Imports\TrainingMemberImport;
use App\Models\Training;
use App\Models\TrainingMember;
use App\Services\TrainingMemberService;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TrainingMemberController extends Controller
{
    use PaginationTrait;
    private TrainingMemberInterface $trainingMember;
    private TrainingMemberService $service;

    public function __construct(TrainingMemberInterface $trainingMember, TrainingMemberService $service)
    {
        $this->trainingMember = $trainingMember;
        $this->service = $service;
    }

    /**
     * index
     *
     * @param  mixed $training
     * @param  mixed $request
     * @return void
     */
    public function index(Training $training, Request $request)
    {
        $request->merge(['training_id' => $training->id]);
        $trainingMembers = $this->trainingMember->customPaginate($request, 10);
        // if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($trainingMembers->currentPage(), $trainingMembers->lastPage());
        $data['data'] = TrainingMemberResource::collection($trainingMembers);
        return ResponseHelper::success($data);
        // }else{
        //     return view();
        // }
    }

    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $training
     * @return void
     */
    public function store(TrainingMemberRequest $request, Training $training)
    {
        $this->trainingMember->store($this->service->store($request, $training));
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $trainingMember
     * @return void
     */
    public function update(TrainingMemberRequest $request, TrainingMember $trainingMember)
    {
        $this->trainingMember->update($trainingMember->id, $this->service->update($request, $trainingMember));
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * destroy
     *
     * @param  mixed $trainingMember
     * @return void
     */
    public function destroy(TrainingMember $trainingMember, Request $request)
    {
        $this->trainingMember->delete($trainingMember->id);
        $this->service->remove($trainingMember->file);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * import
     *
     * @param  mixed $request
     * @return void
     */
    public function import(ImportRequest $request)
    {
        $data = $request->validated();
        Excel::import(new TrainingMemberImport, $data['import']);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }
}
