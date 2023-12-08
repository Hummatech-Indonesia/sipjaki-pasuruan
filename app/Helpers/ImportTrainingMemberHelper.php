<?php

namespace App\Helpers;

use App\Models\TrainingMember;

class ImportTrainingMemberHelper
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
        return TrainingMember::query()
            ->create($data);
    }
}
