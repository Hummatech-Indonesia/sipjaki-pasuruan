<?php

namespace App\Observers;

use App\Models\Type;
use Faker\Provider\Uuid;

class TypeObserver
{
    /**
     * Handle the Type "created" event.
     */
    public function creating(Type $type): void
    {
        $type->id = Uuid::uuid();
    }
}
