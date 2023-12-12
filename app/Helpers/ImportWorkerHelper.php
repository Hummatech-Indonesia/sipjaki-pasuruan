<?php

namespace App\Helpers;

use App\Models\Worker;

class ImportWorkerHelper
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
        return Worker::query()
            ->create($data);
    }
}
