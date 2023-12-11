<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface NewsInterface extends StoreInterface, CustomPaginationInterface, DeleteInterface, UpdateInterface, ShowInterface
{
    /**
     * displayLatestNews
     *
     * @param  mixed $request
     * @param  mixed $pagination
     * @return LengthAwarePaginator
     */
    public function displayLatestNews(Request $request, int $pagination = 10): LengthAwarePaginator;

    /**
     * randomNews
     *
     * @return mixed
     */
    public function randomNews(): mixed;
}
