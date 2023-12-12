<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Http\Requests\DinasRequest;
use App\Models\Dinas;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    private DinasInterface $dinas;
    public function __construct(DinasInterface $dinas)
    {
        $this->dinas = $dinas;
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
