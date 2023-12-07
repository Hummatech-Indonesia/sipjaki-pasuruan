<?php

namespace App\Observers;

use App\Models\Accident;
use Faker\Provider\Uuid;

class AccidentObserver
{
    /**
     * Handle the Accident "creating" event.
     */
    public function creating(Accident $accident): void
    {
        $accident->id = Uuid::uuid();
    }
}
