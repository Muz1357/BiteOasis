<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('access-admin-dashboard', fn(User $user) => $user->role === 'admin');
        Gate::define('manage-products', fn(User $user) => $user->role === 'admin');
        Gate::define('manage-users', fn(User $user) => $user->role === 'admin');
        Gate::define('manage-orders', fn(User $user) => $user->role === 'admin');
    }
}
