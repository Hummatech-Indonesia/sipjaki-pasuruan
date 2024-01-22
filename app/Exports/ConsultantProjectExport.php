<?php

namespace App\Exports;

use App\Contracts\Interfaces\ConsultantProjectInterface;
use App\Contracts\Interfaces\ExecutorProjectInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request; // Import the Request class
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ConsultantProjectExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $request;
    private ConsultantProjectInterface $consultantProject;

    public function __construct(
        Request $request,
        ConsultantProjectInterface $consultantProject,
    ) {
        $this->request = $request;
        $this->consultantProject = $consultantProject;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $consultantProjects = $this->consultantProject->search($this->request);

        return view('exports.consultant-project', ['consultantProjects' => $consultantProjects]);
    }
}
