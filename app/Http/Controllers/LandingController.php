<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\RuleInterface;
use App\Contracts\Interfaces\TrainingInterface;
use App\Models\Dinas;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    private DinasInterface $dinas;
    private NewsInterface $news;
    private TrainingInterface $training;
    private RuleInterface $rule;

    public function __construct(DinasInterface $dinas, NewsInterface $news, TrainingInterface $training,RuleInterface $rule)
    {
        $this->dinas = $dinas;
        $this->news = $news;
        $this->training = $training;
        $this->rule = $rule;
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
     * projectDetail
     *
     * @return View
     */
    public function projectDetail(Request $request,Dinas $dinas): View
    {
        $data = $this->dinas->search($request);

        $detailDinas = $this->dinas->show($dinas->id);

        return view('detail-paket',compact('data','detailDinas'));
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
    
    /**
     * latestNews
     *
     * @param  mixed $request
     * @return view
     */
    public function latestNews(Request $request) : view 
    {
        $news = $this->news->customPaginate($request, 10);
        return view('berita-terbaru', ['news' => $news]);
    }
    
    /**
     * show
     *
     * @param  mixed $news
     * @param  mixed $request
     * @return View
     */
    public function show(News $news,Request $request) : View 
    {
        $data = $this->news->show($news->id);
        $dataNews = $this->news->customPaginate($request, 10);
        return view('detail-berita', compact('data', 'dataNews'));

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

    public function rules(Request $request) : View {
        $rules = $this->rule->customPaginate($request,10);
        return view('peraturan',compact('rules'));
    }
}
