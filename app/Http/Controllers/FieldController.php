<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FieldInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\FieldRequest;
use App\Http\Resources\FieldResource;
use App\Models\Field;
use App\Traits\PaginationTrait;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    use PaginationTrait;
    private FieldInterface $field;
    public function __construct(FieldInterface $field)
    {
        $this->field = $field;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fields = $this->field->customPaginate($request, 10);
        if ($request->is('api/*')) {
            $data['paginate'] = $this->customPaginate($fields->currentPage(), $fields->lastPage());
            $data['data'] = FieldResource::collection($fields);
            return ResponseHelper::success($data);
        } else {
            $name = $request->name;
            return view('pages.fields', compact('fields', 'name'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FieldRequest $request)
    {
        $this->field->store($request->validated());
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
     * update
     *
     * @param  mixed $request
     * @param  mixed $field
     * @return void
     */
    public function update(FieldRequest $request, Field $field)
    {
        $this->field->update($field->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
    }

    /**
     * destroy
     *
     * @param  mixed $field
     * @return void
     */
    public function destroy(Field $field, Request $request)
    {
        $this->field->delete($field->id);
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.delete_success'));
        }
    }
}
