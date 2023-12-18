<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasQualificationLevelTraining
{
    /**
     * Get the classification that owns the HasOneDinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function qualificationLevelTraining(): BelongsTo;
}
