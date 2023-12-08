<?php

namespace App\Observers;

use App\Models\Training;
use Faker\Provider\Uuid;

class TrainingObserver
{
    /**
     * Handle the Training "creating" event.
     */
    public function creating(Training $training): void
    {
        $training->id = Uuid::uuid();
    }

}
