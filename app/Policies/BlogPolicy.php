<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Hash;

class BlogPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user,Blog $blog){
        return $user->username ==="admin" && Hash::check("admin1234",$user->password)
                                                    ? Response::allow()
                                                    : Response::denyWithStatus(403);
    }
}
