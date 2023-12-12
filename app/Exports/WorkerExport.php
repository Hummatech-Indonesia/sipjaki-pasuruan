<?php

namespace App\Exports;

use App\Models\Worker;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class WorkerExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $workers = Worker::query()->where('service_provider_id', auth()->user()->serviceProvider->id)->get();
        return view('exports.workers', [
            'workers' => $workers
        ]);
    }
}
