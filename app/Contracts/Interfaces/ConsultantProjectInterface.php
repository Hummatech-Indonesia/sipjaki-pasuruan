<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface ConsultantProjectInterface extends ShowInterface, StoreInterface, UpdateInterface
{
    // Define your interface methods here
}
