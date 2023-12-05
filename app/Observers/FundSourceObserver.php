<?php

namespace App\Observers;

use App\Models\FundSource;
use Faker\Provider\Uuid;

class FundSourceObserver
{
    /**
     * Handle the FundSource "created" event.
     */
    public function creating(FundSource $fundSource): void
    {
        $fundSource->id = Uuid::uuid();
    }
}
