<?php

/*
 * =========================================================================
 * © 2026 Erebus Labs Inc.
 * Author: Czar Erebus
 * =========================================================================
 * EncryptCookies Middleware
 * =========================================================================
 */

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
