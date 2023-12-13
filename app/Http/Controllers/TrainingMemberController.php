<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingMember;
use App\Helpers\ResponseHelper;
use App\Traits\PaginationTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ImportRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TrainingMemberImport;
use Illuminate\Http\RedirectResponse;
use App\Services\TrainingMemberService;
use App\Http\Requests\TrainingMemberRequest;
use App\Http\Resources\TrainingMemberResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\DeleteTrainingMemberRequest;
use App\Contracts\Interfaces\TrainingMemberInterface;

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
        
        if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($trainingMembers->currentPage(), $trainingMembers->lastPage());
        $data['data'] = TrainingMemberResource::collection($trainingMembers);
        return ResponseHelper::success($data);
        }else{
            return view('pages.dinas.detail-training' ,compact('trainingMembers' ,'training'));
        }
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
    public function update(TrainingMemberRequest $request, TrainingMember $training_member)
    {
        $this->trainingMember->update($training_member->id, $this->service->update($request, $training_member));
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

    public function multipleDelete(DeleteTrainingMemberRequest $request) : RedirectResponse | JsonResponse
    {
        $data = $request->validated();
        $this->trainingMember->multipleDelete($data['id']);

        return redirect()->back()->with('success', trans('alert.delete_success'));
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
