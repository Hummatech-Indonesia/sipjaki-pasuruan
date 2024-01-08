<?php

namespace App\Exports;

use App\Models\Project;
use App\Models\TrainingMember;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request; // Import the Request class
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TrainingMemberExport implements FromView, ShouldAutoSize
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
        $trainingMembers = TrainingMember::query()
            ->when($this->request->training, function ($query) {
                $query->where('training_id', $this->request->training);
            })
            ->get();

        return view('exports.training-member', ['trainingMembers' => $trainingMembers]);
    }
}
