<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProjectInterface extends GetInterface, StoreInterface, CustomPaginationInterface, DeleteInterface, UpdateInterface, ShowInterface
{
    /**
     * Handle paginate data event from models.
     *
     * @param Request $request
     * @param int $pagination
     *
     * @return LengthAwarePaginator
     */

    public function serviceProviderProject(Request $request, int $pagination = 10): LengthAwarePaginator;

    /**
     * getAllProject
     *
     * @param  mixed $request
     * @return mixed
     */
    public function getAllProject(Request $request): mixed;


    /**
     * getbyId
     *
     * @return mixed
     */
    public function getbyId(): mixed;
}
