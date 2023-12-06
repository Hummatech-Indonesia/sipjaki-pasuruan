<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPERADMIN = 'superadmin';
    case ADMIN = 'admin';
    case DINAS = 'dinas';
    case SERVICE_PRODIVER = 'service provider';
}
