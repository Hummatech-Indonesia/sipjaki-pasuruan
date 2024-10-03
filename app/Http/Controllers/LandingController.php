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
use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Contracts\Interfaces\FiscalYearInterface;
use App\Contracts\Interfaces\ImageInterface;
use App\Contracts\Interfaces\TrainingInterface;
use App\Contracts\Interfaces\ServiceProviderInterface;
use App\Models\DummyProject;
use App\Models\ExecutorProject;

class LandingController extends Controller
{

    private DinasInterface $dinas;
    private NewsInterface $news;
    private TrainingInterface $training;
    private RuleInterface $rule;
    private FaqInterface $faq;
    private ServiceProviderInterface $serviceProvider;
    private ImageInterface $image;
    private FiscalYearInterface $fiscalYear;
    private ExecutorProjectInterface $executorProject;

    public function __construct(
        FaqInterface $faq,
        DinasInterface $dinas,
        NewsInterface $news,
        TrainingInterface $training,
        RuleInterface $rule,
        ServiceProviderInterface $serviceProvider,
        ImageInterface $image,
        FiscalYearInterface $fiscalYear,
        ExecutorProjectInterface $executorProject
    )
    {
        $this->dinas = $dinas;
        $this->news = $news;
        $this->training = $training;
        $this->rule = $rule;
        $this->faq = $faq;
        $this->serviceProvider = $serviceProvider;
        $this->image = $image;
        $this->fiscalYear = $fiscalYear;
        $this->executorProject = $executorProject;
    }
    /**
     * project
     *
     * @param  mixed $request
     * @return View
     */
    public function project(Request $request): View
    {
        // $dinas = $this->dinas->search($request);
        $fiscalYears = $this->fiscalYear->get();

        $per_page = $request->per_page ?? 10;
        $page = $request->page ?? 1;

        $years = [2020, 2021, 2022, 2023, 2024, 2025];
        $selectedYear = $request->year;

        $dinas = DummyProject::when($request->search, function($query) use ($request){
            $query->where('nama_dinas','like','%'.$request->search.'%')
            ->orwhere('nama_pekerjaan','like','%'.$request->search.'%');
        })
        ->when($request->year, function($query) use ($request){
            $query->where('tahun_anggaran',$request->year);
        })
        ->orderBy('tahun_anggaran', 'DESC')
        ->paginate($per_page, ['*'], 'page', $page);
        
        return view('paket-pekerjaan', compact(
            'dinas',
            'fiscalYears',
            'years',
            'selectedYear'
        ));
    }

    /**
     * projectDetail
     *
     * @return View
     */
    public function projectDetail(Request $request, Dinas $dinas): View
    {
        $data = $this->dinas->search($request);

        $request->merge([
            'dinas' => $dinas->id
        ]);
        $executorProjects = $this->executorProject->customPaginate($request,15);

        return view('detail-paket',compact(
            'data',
            'executorProjects',
        ));
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
        return view('pelatihan', compact('trainings', 'name'));
    }

    public function rules(Request $request): View
    {
        $rules = $this->rule->customPaginate($request, 10);
        $name = $request->title;
        return view('peraturan', compact('rules', 'name'));
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

    /**
     * image
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function image(Request $request): JsonResponse
    {
        $images = $this->image->search($request);
        return ResponseHelper::success($images);
    }
}
