<?php

/*
 * =========================================================================
 * © 2026 Erebus Labs Inc.
 * Author: Czar Erebus
 * =========================================================================
 * SuportRequestPolicy Policy
 * =========================================================================
 */

namespace App\Policies;

use App\Models\User;
use App\Models\SupportRequest;

class SupportRequestPolicy
{
    public function view(User $user, SupportRequest $supportRequest): bool
    {
        return $user->id === $supportRequest->user_id || $user->isAdmin();
    }

    public function reply(User $user, SupportRequest $supportRequest): bool
    {
        return $user->id === $supportRequest->user_id || $user->isAdmin();
    }
}
