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
use App\Http\Requests\DeleteTrainingMemberRequest;
use App\Contracts\Interfaces\TrainingMemberInterface;
use App\Exports\TrainingMemberExport;
use App\Http\Requests\TrainingMemberUpdateRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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
        $trainingMembers->appends(['name' => $request->name]);

        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($trainingMembers->currentPage(), $trainingMembers->lastPage());
            $data['data'] = TrainingMemberResource::collection($trainingMembers);
            return ResponseHelper::success($data);
        } else {
            $name = $request->name;
            return view('pages.dinas.detail-training', compact('trainingMembers', 'training', 'name'));
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
    public function update(TrainingMemberUpdateRequest $request, TrainingMember $training_member)
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

    public function multipleDelete(DeleteTrainingMemberRequest $request): RedirectResponse | JsonResponse
    {
        $data = explode(',', $request->id);
        $this->trainingMember->multipleDelete($data);

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

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * exportPdf
     *
     * @return void
     */
    public function exportPdf(Request $request)
    {
        $data['trainingMembers'] = $this->trainingMember->search($request);
        $data['now'] = Carbon::now()->isoFormat('Y-m-d H:i:s');
        $pdf = Pdf::loadView('exports.training-member-pdf', $data);

        return $pdf->download('training-member' . auth()->user()->name . '.pdf');
    }

    /**
     * export
     *
     * @param  mixed $request
     * @return void
     */
    public function export(Request $request)
    {
        return Excel::download(new TrainingMemberExport($request), 'training-member' . auth()->user()->name . '.xlsx');
    }
}
