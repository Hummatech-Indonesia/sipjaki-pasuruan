<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CountInterface;
use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\SearchInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use Illuminate\Http\Request;

interface DinasInterface extends CustomPaginationInterface,CountInterface,SearchInterface, UpdateInterface, ShowInterface, GetInterface
{
    /**
     * countAccidentByDinas
     *
     * @param  mixed $request
     * @return mixed
     */
    public function countAccidentByDinas(Request $request): mixed;

}
