<?php

namespace App\Observers;

use App\Models\Association;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;

class AssociationObserver
{
    /**
     * Handle the Association "created" event.
     */
    public function creating(Association $association): void
    {
        $association->id = Uuid::uuid();
        $association->slug = Str::slug($association->name);
    }

    public function updating(Association $association): void
    {
        $association->slug = Str::slug($association->name);
    }
}
