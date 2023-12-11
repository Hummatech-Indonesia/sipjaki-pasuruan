<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    private DinasInterface $dinas;

    public function __construct(DinasInterface $dinas)
    {
        $this->dinas = $dinas;
    }
    public function project(Request $request) : View
    {
        $dinas = $this->dinas->search($request);
        return view('paket-pekerjaan',compact('dinas'));
    }
}
