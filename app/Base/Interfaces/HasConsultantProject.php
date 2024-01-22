<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasConsultantProject
{
    /**
     * Get the consultantProject that owns the consultantProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consultantProject(): BelongsTo;
}
