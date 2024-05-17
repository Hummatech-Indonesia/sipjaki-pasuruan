<?php

namespace App\Observers;

use App\Models\News;
use Faker\Provider\Uuid;
use Illuminate\Support\Str;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function creating(News $news): void
    {
        $news->id = Uuid::uuid();
        $news->slug = Str::slug($news->title);
    }
}
