<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Writeup;

class WriteupPolicy
{
    public function update(User $user, Writeup $writeup): bool
    {
        return $user->id === $writeup->user_id;
    }

    public function delete(User $user, Writeup $writeup): bool
    {
        return $user->id === $writeup->user_id;
    }
}
