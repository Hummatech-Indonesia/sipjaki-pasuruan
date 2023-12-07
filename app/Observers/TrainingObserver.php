<?php

namespace App\Observers;

use App\Models\Training;
use Faker\Provider\Uuid;

class TrainingObserver
{
    /**
     * Handle the Training "creating" event.
     */
    public function creatinf(Training $training): void
    {
        $training->id = Uuid::uuid();
        $training->dinas_id = auth()->user()->dinas->id;
    }

}
