<?php

namespace App\Observers;

use App\Models\Rules;
use Faker\Provider\Uuid;

class RuleObserver
{
    /**
     * Handle the Rules "created" event.
     */
    public function creating(Rules $rules): void
    {
        $rules->id = Uuid::uuid();
    }
}
