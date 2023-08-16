<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-post', function ($user) {
            return $user->hasPermissionTo('create post');
        });

        Gate::define('edit-post', function ($user) {
            return $user->hasPermissionTo('edit post');
        });

        Gate::define('delete-post', function ($user) {
            return $user->hasPermissionTo('delete post');
        });

    }
}
