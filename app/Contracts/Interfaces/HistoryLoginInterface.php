<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\CustomPaginationInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;

interface HistoryLoginInterface extends StoreInterface, CustomPaginationInterface
{

}
