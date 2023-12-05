<?php

namespace App\Observers;

use App\Models\Classification;
use Faker\Provider\Uuid;

class ClassificationObserver
{
    /**
     * Handle the Classification "created" event.
     */
    public function creating(Classification $classification): void
    {
        $classification->id = Uuid::uuid();
    }
}
