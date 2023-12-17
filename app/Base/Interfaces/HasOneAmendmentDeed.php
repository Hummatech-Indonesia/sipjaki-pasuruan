<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneAmendmentDeed {
    /**
     * amendmendDeed
     *
     * @return HasOne
     */
    public function amendmentDeed(): HasOne;
}
