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
        $trainings = Training::query()
            ->when($this->request->name, function ($query) {
                $query->where('name', 'LIKE', '%' . $this->request->name . '%');
            })
            ->when($this->request->fiscal_year_id, function ($query) {
                $query->where('fiscal_year_id', $this->request->fiscal_year_id);
            })
            ->get();

        return view('exports.training', ['trainings' => $trainings]);
    }
}
