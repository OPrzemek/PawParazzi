<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin_area', function(User $user) {
            return $user->is_admin == 1;
        });
        Gate::define('has_pets', function(User $user) {
            return $user->pets->count() > 0;
        });
    }
}
