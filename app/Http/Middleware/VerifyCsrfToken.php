<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'import-training-members',
        'reset-passsword/a10d6118-cdbc-3d9c-9805-f432f2636380',
        'send-email-reset-passsword'
    ];
}
