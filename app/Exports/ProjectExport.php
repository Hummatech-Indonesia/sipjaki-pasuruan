<?php

namespace App\Exports;

use App\Contracts\Interfaces\ExecutorProjectInterface;
use App\Models\ExecutorProject;
use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request; // Import the Request class
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProjectExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $request;
    private ExecutorProjectInterface $executorProject;

    public function __construct(
        Request $request,
        ExecutorProjectInterface $executorProject,
    )
    {
        $this->request = $request;
        $this->executorProject = $executorProject;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $projects = $this->executorProject->search($this->request);

        return view('exports.projects', ['projects' => $projects]);
    }
}
