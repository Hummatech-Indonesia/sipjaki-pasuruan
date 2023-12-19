<?php

namespace App\Observers;

use App\Models\FoundingDeed;
use Faker\Provider\Uuid;

class FoundingDeedObserver
{

    /**
     * Handle the FoundingDeed "creating" event.
     */
    public function creating(FoundingDeed $foundingDeed): void
    {
        $foundingDeed->id = Uuid::uuid();
    }
}
