<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasTrainings
{
    /**
     * Get all of the trainings for the HasTrainings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trainings(): HasMany;
}
