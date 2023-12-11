<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;


interface HasTrainingMembers
{
    /**
     * serviceProviders
     *
     * @return HasMany
     */
    public function trainingMembers(): HasMany;
}
