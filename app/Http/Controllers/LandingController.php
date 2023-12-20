<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Dinas;
use App\Models\Association;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\RuleInterface;
use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\TrainingInterface;
use App\Contracts\Interfaces\AssociationInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;

class LandingController extends Controller
{

    private DinasInterface $dinas;
    private NewsInterface $news;
    private TrainingInterface $training;
    private RuleInterface $rule;
    private FaqInterface $faq;
    private ServiceProviderInterface $serviceProvider;

    public function __construct(FaqInterface $faq, DinasInterface $dinas, NewsInterface $news, TrainingInterface $training, RuleInterface $rule, ServiceProviderInterface $serviceProvider)
    {
        $this->dinas = $dinas;
        $this->news = $news;
        $this->training = $training;
        $this->rule = $rule;
        $this->faq = $faq;
        $this->serviceProvider = $serviceProvider;
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
        $name = $request->name;
        return view('paket-pekerjaan', compact('dinas', 'name'));
    }

    /**
     * projectDetail
     *
     * @return View
     */
    public function projectDetail(Request $request, Dinas $dinas): View
    {
        $data = $this->dinas->search($request);

        $detailDinas = $this->dinas->show($dinas->id);
        $name = $request->name;

        return view('detail-paket', compact('data', 'detailDinas','name'));
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
    public function latestNews(Request $request): view
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
    public function show(News $news, Request $request): View
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
        $name = $request->name;
        return view('pelatihan', compact('trainings','name'));
    }

    public function rules(Request $request): View
    {
        $rules = $this->rule->customPaginate($request, 10);
        $name = $request->title;
        return view('peraturan', compact('rules','name'));
    }

    public function faq(): View
    {
        $faqs = $this->faq->get();

        return view('faq', compact('faqs'));
    }

    /**
     * associationDetail
     *
     * @param  mixed $association
     * @param  mixed $request
     * @return JsonResponse
     */
    public function associationDetail(Association $association, Request $request): JsonResponse|View
    {
        $serviceProviders = $this->serviceProvider->getByAssosiasi($association->id, $request);
        if ($request->is('api/*')) {
            return ResponseHelper::success($serviceProviders);
        } else {
            return view('detail-asosiasi', ['serviceProviders' => $serviceProviders]);
        }
    }
}
