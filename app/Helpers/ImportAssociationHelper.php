<?php

namespace App\Helpers;

use App\Models\Association;

class ImportAssociationHelper
{
    /**
     * Handle import data event to models.
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function import(array $data): mixed
    {
        return Association::query()
            ->create($data);
    }
}
