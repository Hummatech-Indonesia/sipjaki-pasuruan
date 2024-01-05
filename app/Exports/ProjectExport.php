<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request; // Import the Request class
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProjectExport implements FromView, ShouldAutoSize
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $projects = Project::query()->with('serviceProviderProjects')
            ->when(auth()->user()->dinas, function ($query) {
                $query->whereRelation('dinas', 'dinas_id', auth()->user()->dinas->id);
            })
            ->when($this->request->name, function ($query) {
                $query->where('name', 'LIKE', '%' . $this->request->name . '%');
            })
            ->when($this->request->year, function ($query) {
                $query->whereYear('year', $this->request->year);
            })
            ->when($this->request->status, function ($query) {
                $query->where('status', $this->request->status);
            })
            ->get();

        return view('exports.projects', ['projects' => $projects]);
    }
}
