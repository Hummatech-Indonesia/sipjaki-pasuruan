<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    /**
     * dashboard
     *
     * @return View
     */
    public function dashboard(): View
    {
        return view('pages.dasboard');
    }
}
