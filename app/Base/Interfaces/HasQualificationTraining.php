<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasQualificationTraining
{
    /**
     * Get the qualification that owns the HasOneDinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualificationTraining(): BelongsTo;
}
