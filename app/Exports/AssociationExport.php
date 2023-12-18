<?php

namespace App\Exports;

use App\Models\Association;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class AssociationExport implements FromView, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $associations = Association::query()->get();
        return view('exports.associations', [
            'associations' => $associations
        ]);
    }
}
