<?php

namespace App\Observers;

use App\Models\Image;
use Faker\Provider\Uuid;

class ImageObserver
{
    /**
     * Handle the Image "created" event.
     */
    public function creating(Image $image): void
    {
        $image->id = Uuid::uuid();
    }
}
