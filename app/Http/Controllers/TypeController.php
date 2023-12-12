<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TypeInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\TypeRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    use PaginationTrait;
    private TypeInterface $type;

    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $types = $this->type->customPaginate($request, 10);
        // if ($request->is('api/*')) {
        $data['paginate'] = $this->customPaginate($types->currentPage(), $types->lastPage());
        $data['data'] = TypeResource::collection($types);
        return ResponseHelper::success($data);
        // } else {
        //     $name = $request->name;
        //     return view('pages.fields', compact('fields', 'name'));
        // }
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
    public function store(TypeRequest $request)
    {
        $this->type->store($request->validated());

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.add_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.add_success'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, Type $type)
    {
        $this->type->update($type->id, $request->validated());

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type, Request $request)
    {
        $this->type->delete($type->id);

        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
