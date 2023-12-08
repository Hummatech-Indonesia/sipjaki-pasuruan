<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;


interface HasServiceProviders
{
    /**
     * serviceProviders
     *
     * @return HasMany
     */
    public function serviceProviders(): HasMany;
}
