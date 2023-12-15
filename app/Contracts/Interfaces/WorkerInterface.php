<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface WorkerInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface
{
    /**
     * deleteMultiple
     *
     * @param  mixed $data
     * @return mixed
     */
    public function deleteMultiple(array $data): mixed;

    /**
     * getByServiceProvider
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getByServiceProvider(Request $request): mixed;
}
