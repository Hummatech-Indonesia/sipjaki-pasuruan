<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;


interface HasAccidents
{
    /**
     * Get all of the accidents for the Hasaccidents
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accidents(): HasMany;
}
