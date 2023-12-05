<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;


interface HasQualificationLevels
{
    /**
     * Get all of the qualificationLevels for the HasQualificationLevels
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function qualificationLevels(): HasMany;
}
