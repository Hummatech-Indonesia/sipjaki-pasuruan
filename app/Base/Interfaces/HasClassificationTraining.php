<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasClassificationTraining
{
    /**
     * classificationTraining
     *
     * @return BelongsTo
     */
    public function classificationTraining(): BelongsTo;
}
