<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AssociationInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\AssociationRequest;
use App\Http\Resources\AssociationResource;
use App\Models\Association;
use App\Traits\PaginationTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($associations->currentPage(), $associations->lastPage());
        $data['data'] = AssociationResource::collection($associations);
        return ResponseHelper::success($data);
        } else {
            return view('pages.assosiation',compact('associations'));
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
        return redirect()->back()->with('success', trans('alert.add_success'));
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
    public function delete(Association $association, Request $request)
    {
        $this->association->delete($association->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }
}
