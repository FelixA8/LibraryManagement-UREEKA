<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function adminOnly(User $user)
    {
        \Log::info('User Authenticated:', ['authenticated' => $user]);
        return $user->role === 'admin';
    }
}
