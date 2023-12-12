<?php

namespace App\Exports;

use App\Models\Worker;
use Maatwebsite\Excel\Concerns\FromCollection;

class WorkerExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Worker::query()->where('service_provider_id', auth()->user()->serviceProvider->id)->get();
    }
}
