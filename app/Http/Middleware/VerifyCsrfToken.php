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
        'verify-token/b59bedcd-c89b-3c81-b2f5-d7002d2d102a',
        'update-token/b59bedcd-c89b-3c81-b2f5-d7002d2d102a',
    ];
}
