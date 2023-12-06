<?php

namespace App\Observers;

use App\Models\Dinas;
use Faker\Provider\Uuid;

class DinasObserver
{
    /**
     * Handle the Dinas "created" event.
     */
    public function creating(Dinas $dinas): void
    {
        $dinas->id = Uuid::uuid();
    }
}
