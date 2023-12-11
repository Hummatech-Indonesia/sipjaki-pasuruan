<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\NewsInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    private DinasInterface $dinas;
    private NewsInterface $news;

    public function __construct(DinasInterface $dinas, NewsInterface $news)
    {
        $this->dinas = $dinas;
        $this->news = $news;
    }
    public function project(Request $request): View
    {
        $dinas = $this->dinas->search($request);
        return view('paket-pekerjaan', compact('dinas'));
    }
    public function news(Request $request): View
    {
        $news = $this->news->customPaginate($request, 10);
        return view('welcome', ['news' => $news]);
    }
}
