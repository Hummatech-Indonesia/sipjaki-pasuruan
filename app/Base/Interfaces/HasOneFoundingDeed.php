<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneFoundingDeed {
    /**
     * foundingDeed
     *
     * @return HasOne
     */
    public function foundingDeed(): HasOne;
}
