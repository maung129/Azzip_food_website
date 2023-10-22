<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Blog;
use App\Models\User;
use App\Policies\AdminPolicy;
use App\Policies\BlogPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Blog::class => BlogPolicy::class,
        User::class => AdminPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
