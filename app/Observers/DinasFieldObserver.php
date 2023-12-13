<?php

namespace App\Observers;

use App\Models\DinasField;
use Faker\Provider\Uuid;

class DinasFieldObserver
{
    /**
     * Handle the DinasField "created" event.
     */
    public function creating(DinasField $dinasField): void
    {
        $dinasField->id = Uuid::uuid();
    }
}
