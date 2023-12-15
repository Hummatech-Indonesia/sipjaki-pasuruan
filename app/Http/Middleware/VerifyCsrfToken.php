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
        'send-email-reset-passsword',
        'users',
        'fields',
        'users/06124858-a94d-338e-b7bf-214fc9529391',
        'login',
        'register',
        'update-profile',
        'service-provider-projects/b0e392fa-9904-3327-83e4-d845ddeca099',
        'service-provider-projects/633b52a6-61e0-3a1d-af41-9467b7898c71',
        'import-workers',
        'dinas',
        'images',
        'update-password',
        'associations',
        'associations/nama-asosiasi',
        'profile-service-providers'
    ];
}
