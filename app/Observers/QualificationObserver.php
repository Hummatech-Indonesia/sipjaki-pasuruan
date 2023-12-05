<?php

namespace App\Observers;

use App\Models\Qualification;
use Faker\Provider\Uuid;

class QualificationObserver
{
    /**
     * Handle the Qualification "creating" event.
     */
    public function creating(Qualification $qualification): void
    {
        $qualification->id = Uuid::uuid();
    }

}
