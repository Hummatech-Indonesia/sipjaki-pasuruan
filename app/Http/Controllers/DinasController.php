<?php

namespace App\Http\Controllers;

use App\Models\Dinas;
use Illuminate\Http\Request;
use App\Http\Requests\DinasRequest;
use App\Contracts\Interfaces\TypeInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\FieldInterface;
use App\Contracts\Interfaces\SectionInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\DinasAccidentResource;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    private FieldInterface $field;
    private SectionInterface $section;
    private TypeInterface $type;

    public function __construct(DinasInterface $dinas, FieldInterface $field, SectionInterface $section, TypeInterface $type)
    {
        $this->dinas = $dinas;
        $this->field = $field;
        $this->section = $section;
        $this->type = $type;
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $sections = $this->section->get();
        $fields = $this->field->get();
        $types = $this->type->get();
        return view('pages.profile-opd', [
            'sections' => $sections,
            'fields' => $fields,
            'types' => $types,
        ]);
    }
    /**
     * update
     *
     * @param  mixed $dinas
     * @param  mixed $request
     * @return void
     */
    public function update(DinasRequest $request)
    {
        $this->dinas->update(auth()->user()->dinas->id, $request->validated());
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * chart
     *
     * @return void
     */
    public function chart()
    {
        $dinases =  $this->dinas->get();
        $data = DinasAccidentResource::collection($dinases);
        return ResponseHelper::success($data);
    }
}
