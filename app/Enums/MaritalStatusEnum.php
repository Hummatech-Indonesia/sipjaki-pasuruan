<?php

namespace App\Enums;

enum MaritalStatusEnum: string
{
    case MARRY = 'marry';
    case SINGLE = 'single';
    case DIVORCED = 'divorced';
    case DEATH_DIVORCE = 'death_divorce';
}
