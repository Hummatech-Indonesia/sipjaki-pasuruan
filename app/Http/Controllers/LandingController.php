<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\TrainingInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    private DinasInterface $dinas;
    private NewsInterface $news;
    private TrainingInterface $training;

    public function __construct(DinasInterface $dinas, NewsInterface $news, TrainingInterface $training)
    {
        $this->dinas = $dinas;
        $this->news = $news;
        $this->training = $training;
    }
    /**
     * project
     *
     * @param  mixed $request
     * @return View
     */
    public function project(Request $request): View
    {
        $dinas = $this->dinas->search($request);
        return view('paket-pekerjaan', compact('dinas'));
    }

    /**
     * Get news.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function news(Request $request): View
    {
        $news = $this->news->customPaginate($request, 10);
        return view('welcome', ['news' => $news]);
    }

    public function latestNews(Request $request) : view {
        $news = $this->news->customPaginate($request, 10);
        return view('berita-terbaru', ['news' => $news]);
    }

    /**
     * training
     *
     * @param  mixed $request
     * @return View
     */
    public function training(Request $request): View
    {

        $trainings = $this->training->customPaginate($request, 30);

        return view('pelatihan', compact('trainings'));
    }
}
