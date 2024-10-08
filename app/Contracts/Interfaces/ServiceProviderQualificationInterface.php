<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ServiceProviderQualificationInterface extends StoreInterface, CustomPaginationInterface, DeleteInterface, UpdateInterface, ShowInterface, SearchInterface
{
    /**
     * getActive
     *
     * @return mixed
     */
    public function getActive(): mixed;

    /**
     * getActive
     *
     * @return mixed
     */
    public function getPending(): mixed;
    /**
     * getActive
     *
     * @return mixed
     */
    public function getReject(): mixed;
}
