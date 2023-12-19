<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasConsultant
{
    /**
     * Get the user that owns the HasOneDinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultant(): BelongsTo;
}
