<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

interface DinasInterface extends UpdateInterface, ShowInterface
{
}
