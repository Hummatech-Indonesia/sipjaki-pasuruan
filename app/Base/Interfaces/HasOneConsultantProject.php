<?php

namespace App\Base\Interfaces;


use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneConsultantProject
{
    /**
     * Get the dinas that owns the HasOneDinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function consultantProject(): HasOne;
}
