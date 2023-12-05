<?php

namespace App\Base\Interfaces;


use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneDinas
{
    /**
     * Get the dinas that owns the HasOneDinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dinas(): HasOne;
}
