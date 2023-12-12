<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ServiceProviderProjectInterface extends StoreInterface, DeleteInterface, UpdateInterface, ShowInterface, SearchInterface
{
    /**
     * getByProject
     *
     * @param  mixed $id
     * @return mixed
     */
    public function getByProject(mixed $id): mixed;
}
