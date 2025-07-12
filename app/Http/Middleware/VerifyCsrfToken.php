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
        // This line allows all routes starting with 'stripe/' to bypass CSRF checks.
        // It is the standard and secure way to handle Stripe webhooks.
        'stripe/*',
    ];
}
