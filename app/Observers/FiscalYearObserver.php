<?php

namespace App\Observers;

use App\Models\FiscalYear;
use Faker\Provider\Uuid;

class FiscalYearObserver
{
    /**
     * Handle the FiscalYear "creating" event.
     */
    public function creating(FiscalYear $fiscalYear): void
    {
        $fiscalYear->id = Uuid::uuid();
    }

}
