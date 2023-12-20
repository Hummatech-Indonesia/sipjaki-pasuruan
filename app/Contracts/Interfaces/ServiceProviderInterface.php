<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountInterface;
use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface ServiceProviderInterface extends GetInterface, StoreInterface, CustomPaginationInterface, DeleteInterface, UpdateInterface, ShowInterface, SearchInterface, CountInterface
{
    /**
     * getConsultant
     *
     * @return mixed
     */
    public function getConsultant(): mixed;

    /**
     * getExecutor
     *
     * @return mixed
     */
    public function getExecutor(): mixed;


    /**
     * getByAssosiasi
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByAssosiasi(mixed $id, Request $request): mixed;
}
