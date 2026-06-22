<?php

/*
 * =========================================================================
 * © 2026 Erebus Labs Inc.
 * Author: Czar Erebus
 * =========================================================================
 * VerifyCsrfToken Middleware
 * =========================================================================
 */

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
        //
    ];
}
