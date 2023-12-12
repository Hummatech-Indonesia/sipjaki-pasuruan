<?php

namespace App\Observers;

use App\Models\Section;
use Faker\Provider\Uuid;

class SectionObserver
{
    /**
     * Handle the Section "creating" event.
     */
    public function creating(Section $section): void
    {
        $section->id = Uuid::uuid();
    }
}
