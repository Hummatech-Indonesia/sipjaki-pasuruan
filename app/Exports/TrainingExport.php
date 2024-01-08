<?php

namespace App\Exports;

use App\Models\Project;
use App\Models\Training;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request; // Import the Request class
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TrainingExport implements FromView, ShouldAutoSize
{
    use Exportable;

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
        $projects = Training::query()
            ->when($this->request->name, function ($query) {
                $query->where('name', 'LIKE', '%' . $this->request->name . '%');
            })
            ->get();

        return view('exports.projects', ['projects' => $projects]);
    }
}
