<?php

namespace App\Observers;

use App\Models\News;
use Faker\Provider\Uuid;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function creating(News $news): void
    {
        $news->id = Uuid::uuid();
    }
}
