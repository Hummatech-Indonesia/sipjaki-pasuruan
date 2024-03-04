<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AssociationInterface;
use App\Exports\AssociationExport;
use App\Helpers\ResponseHelper;
use App\Http\Requests\AssociationRequest;
use App\Http\Requests\ImportRequest;
use App\Http\Resources\AssociationResource;
use App\Imports\AssociationImport;
use App\Models\Association;
use App\Traits\PaginationTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AssociationController extends Controller
{

    use PaginationTrait;
    private AssociationInterface $association;

    public function __construct(AssociationInterface $association)
    {
        $this->association = $association;
    }

    public function index(Request $request): JsonResponse|View
    {
        $associations = $this->association->customPaginate($request, 10);
        $associations->appends(['name' => $request->name]);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($associations->currentPage(), $associations->lastPage());
            $data['data'] = AssociationResource::collection($associations);
            return ResponseHelper::success($data);
        } else {
            return view('pages.assosiation', compact('associations'));
            
        }
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(AssociationRequest $request)
    {
        $this->association->store($request->validated());
        // return ResponseHelper::success(null, trans('alert.add_success'));
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * update
     *
     * @param  mixed $association
     * @return void
     */
    public function update(AssociationRequest $request, Association $association)
    {
        $this->association->update($association->id, $request->validated());
        // return ResponseHelper::success(null, trans('alert.update_success'));
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * show
     *
     * @param  mixed $association
     * @param  mixed $request
     * @return JsonResponse
     */
    public function show(Association $association, Request $request): JsonResponse|View
    {

        if ($request->is('api/*')) {
            return ResponseHelper::success($association);
        } else {
            return view('pages.detail-association', ['association' => $association]);
        }
    }

    /**
     * delete
     *
     * @return Returntype
     */
    public function destroy(Association $association, Request $request)
    {
        if ($request->is('api/*')) {
            if (!$this->association->delete($association->id)) return ResponseHelper::error(null, trans('alert.delete_failed'));
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            if (!$this->association->delete($association->id)) redirect()->back()->with('error', trans('alert.delete_failed'));
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }

    /**
     * dataServiceProvider
     *
     * @param  mixed $request
     * @return void
     */
    public function dataServiceProvider(Request $request)
    {
        $associations = $this->association->customPaginate($request, 10);
        $data['paginate'] = $this->customPaginate($associations->currentPage(), $associations->lastPage());
        $data['data'] = AssociationResource::collection($associations);
        $name = $request->name;
        if ($request->is('api/*')) {
            return ResponseHelper::success($associations);
        } else {
            return view('asosiasi', ['associations' => $associations,'name'=>$name]);
        };
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
        Excel::import(new AssociationImport, $data['import']);
        if ($request->is('api/*')) {
        return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    public function export()
    {
        return Excel::download(new AssociationExport, 'asosiasi-' . auth()->user()->name . '.xlsx');
    }
}
