<?php

namespace App\Observers;

use App\Models\Project;
use Faker\Provider\Uuid;

class ProjectObserver
{
    /**
     * Handle the Project "creating" event.
     */
    public function creating(Project $project): void
    {
        $project->id = Uuid::uuid();
        $project->dinas_id = auth()->user()->dinas->id;
    }

}
