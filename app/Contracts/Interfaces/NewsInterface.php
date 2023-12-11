<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface NewsInterface extends StoreInterface, CustomPaginationInterface, DeleteInterface, UpdateInterface, ShowInterface
{
    /**
     * displayLatestNews
     *
     * @return mixed
     */
    public function displayLatestNews(): mixed;

    /**
     * randomNews
     *
     * @return mixed
     */
    public function randomNews(): mixed;
}
