<?php

namespace App\Observers;

use App\Models\TrainingMethod;
use Faker\Provider\Uuid;

class TrainingMethodObserver
{
    /**
     * Handle the TrainingMethod "created" event.
     */
    public function creating(TrainingMethod $trainingMethod): void
    {
        $trainingMethod->id = Uuid::uuid();
    }
}
