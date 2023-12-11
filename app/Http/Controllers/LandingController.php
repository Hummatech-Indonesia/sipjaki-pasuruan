<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\DinasInterface;
use App\Contracts\Interfaces\TrainingInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    private DinasInterface $dinas;
    private TrainingInterface $training;

    public function __construct(
        DinasInterface $dinas,
        TrainingInterface $training
        )
    {
        $this->dinas = $dinas;
        $this->training = $training;
    }


    /**
     * project
     *
     * @param  mixed $request
     * @return View
     */
    public function project(Request $request) : View
    {
        $dinas = $this->dinas->search($request);
        return view('paket-pekerjaan',compact('dinas'));
    }
    
    /**
     * training
     *
     * @param  mixed $request
     * @return View
     */
    public function training(Request $request) : View
    {

        $trainings = $this->training->customPaginate($request,30);

        return view('pelatihan',compact('trainings'));
    }
}
