<?php

namespace App\Observers;

use App\Models\SubClassification;
use Faker\Provider\Uuid;

class SubClassificationObserver
{
    /**
     * Handle the SubClassification "created" event.
     */
    public function creating(SubClassification $subClassification): void
    {
        $subClassification->id = Uuid::uuid();
    }
}
