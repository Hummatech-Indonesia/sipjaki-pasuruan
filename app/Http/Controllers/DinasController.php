<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\FieldInterface;
use App\Contracts\Interfaces\SectionInterface;
use App\Http\Requests\DinasRequest;
use App\Models\Dinas;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    private FieldInterface $field;
    private SectionInterface $section;
    public function __construct(DinasInterface $dinas, FieldInterface $field, SectionInterface $section)
    {
        $this->dinas = $dinas;
        $this->field = $field;
        $this->section = $section;
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
        return view('pages.profile-opd', [
            'sections' => $sections,
            'fields' => $fields
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
}
