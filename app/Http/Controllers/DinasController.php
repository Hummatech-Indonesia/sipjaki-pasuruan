<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasFieldInterface;
use App\Http\Requests\DinasRequest;
use App\Contracts\Interfaces\TypeInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\FieldInterface;
use App\Contracts\Interfaces\SectionInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\DinasAccidentResource;
use App\Services\DinasService;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    private FieldInterface $field;
    private SectionInterface $section;
    private TypeInterface $type;
    private UserInterface $user;

    public function __construct(DinasInterface $dinas, FieldInterface $field, SectionInterface $section, TypeInterface $type, UserInterface $user)
    {
        $this->user = $user;
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
        $dinas = auth()->user()->dinas;
        $sections = $this->section->get();
        $fields = $this->field->get();
        $types = $this->type->get();
        return view('pages.profile-opd', [
            'sections' => $sections,
            'fields' => $fields,
            'types' => $types,
            'dinas' => $dinas
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
        $this->user->update(auth()->user()->id, $request->validated(    ));
        $this->dinas->update(auth()->user()->dinas->id, $request->validated());
        if ($request->is('api/*')) {
            return ResponseHelper::success(null, trans('alert.update_success'));
        } else {
            return redirect()->back()->with('success', trans('alert.update_success'));
        }
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
